class Phone{
    constructor(){
        this.navArea = document.querySelector("#phone_nav_area");
        this.itemArea = document.querySelector("#phone_area");
        this.select = "전체";
        this.phoneAllList = [];
        this.phoneNavList = ["전체"];
        this.phoneList = {};
        this.setting();
    }

    async setting(){
        let {statusCd,statusMsg,totalCount,items} = await this.loadPhone();
        this.phoneList = items;
        if(statusCd !== "200"){
            document.querySelector("body").innerHTML = statusMsg;
            alert(statusMsg);
            // location.href= "index.html";
        }else{
            for(let i = 0; i < totalCount; i++){
                let item = items[i];
                if(!this.phoneNavList.find(x => x == item.deptNm)){
                    this.phoneNavList.push(item.deptNm);
                    this.phoneAllList[item.deptNm] = [];
                }
                this.phoneAllList[item.deptNm].push({"name":item.name,"telNo":item.telNo});
            }
        }

        this.setPage();
    }

    setPage(){
        this.navArea.innerHTML = "";
        this.itemArea.innerHTML = "";
        this.phoneNavList.forEach(x=>{this.makeNav(x);});
        if(this.select == "전체")this.phoneNavList.forEach(x=>{this.makeItem(x);});
        else this.makeItem(this.select);
    }

    setSelect=e=>{
        let target = e.target.innerHTML;
        this.select = target;
        this.setPage();
    }

    makeNav(x){
        let dom = document.createElement("div");
        let flag = x == this.select ? "select" : "";
        dom.innerHTML = `<div class="phone_nav_item ${flag}">${x}</div>`;
        dom.querySelector(".phone_nav_item").addEventListener("click",this.setSelect);
        this.navArea.appendChild(dom.firstChild);
    }

    makeItem(x){
        if(x == "전체") return false;
        let list = this.phoneAllList[x] == null ? [] : this.phoneAllList[x];
        let dom = document.createElement("div");
        dom.innerHTML = `<div class="phone_wrap">
                            <h5 class="phone_title">${x}</h5>
                            <div class="phone_list">
                            </div>
                        </div>`;
        console.log(list);
        if(list.length) list.forEach(item=>{dom.querySelector(".phone_list").innerHTML += `<div class="phone_item"><span>${item.telNo}</span><span>|</span><span>${item.name}</span></div>`;})
        else dom.querySelector(".phone_list").innerHTML = `<div class="noData">관련정보가 없습니다.</div>`;
        console.log(dom);
        this.itemArea.appendChild(dom);
    }

    loadPhone(){return fetch("../restAPI/phone.php").then(res=>res.json());}
}

let app = new Phone();