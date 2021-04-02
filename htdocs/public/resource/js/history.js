class History{
    constructor(){
        this.since = this.getLocal("since") == null ? 2021 : this.getLocal("since");
        this.navList = this.getLocal("navList") == null ? [] : this.getLocal("navList");
        this.itemList = this.getLocal(this.since) == null ? [] : this.getLocal(this.since);

        this.navArea = document.querySelector("#history_nav_area");
        this.itemArea = document.querySelector("#history_list");

        this.setting();
        this.setEvent();
    }

    getLocal(key){return JSON.parse(localStorage.getItem(key));}
    setLocal(key,data){localStorage.setItem(key,JSON.stringify(data));}
    removeLocal(key){localStorage.removeItem(key);}

    setEvent(){
        document.querySelector("#add_history_btn").addEventListener("click",()=>{this.add_proccess()});
        document.querySelector("#mod_history_btn").addEventListener("click",(e)=>{this.mod_proccess(e)});
    }

    setting(){
        this.navArea.innerHTML = "";
        this.itemArea.innerHTML = "";

        if(!this.itemList.length) document.querySelector("#history_title").innerHTML = "";
        else document.querySelector("#history_title").innerHTML = this.since;
        if(this.navList.length) this.navList.forEach(x=>{this.makeNav(x)});
        if(this.itemList.length) this.itemList.forEach((x,idx)=>{this.makeItem(x.date,x.title,idx)});
    }

    getYear(date){return date.substr(0,4);}
    getMonth(date){return date.substr(5,2);}
    getDay(date){return date.substr(8,2);}

    dateSort(list){
        let temp = "";
        for(let i = 0; i < list.length; i++){
            for(let j = 0; j < i; j++){
                if(list[j].date > list[j+1].date){
                    temp = list[j];
                    list[j] = list[j+1];
                    list[j+1] = temp;
                }
            }
        }

        return list;
    }

    navSort(list){
        let temp = "";
        for(let i = 0; i < list.length; i++){
            for(let j = 0; j < i; j++){
                if(list[j] < list[j+1]){
                    temp = list[j];
                    list[j] = list[j+1];
                    list[j+1] = temp;
                }
            }
        }

        return list;
    }

    add_proccess(){
        let form = document.querySelector("#add_form");
        let title = form.add_title.value,date = add_date.value;
        let data = {"title":title,"date":date};
        if(title == "" || date == "") return alert("모든 정보를 입력해주세요!");
        let year = this.getYear(date);

        this.since = year;
        this.setLocal("since",year);
        if(this.navList.findIndex(x=>x==year) !== -1){
            let list = this.getLocal(year);
            list.push(data);
            list = this.dateSort(list);
            this.setLocal(year,list);
            this.itemList = list;
        }else{
            this.navList.push(year);
            this.navList = this.navSort(this.navList);
            this.setLocal("navList",this.navList);
            let list = [data];
            this.setLocal(year,list);
            this.itemList = list;
        }

        this.navList = this.navSort(this.navList);
        this.setLocal("navList",this.navList);

        document.querySelector("#add_close").click();
        alert("연혁이 등록되었습니다.");
        form.add_title.value = "";
        form.add_date.value = "";
        this.setting();
    }

    mod_proccess=e=>{
        let idx = e.target.dataset.idx;
        let form = document.querySelector("#mod_form"),title = form.mod_title.value, date = form.mod_date.value,data = {"title":title,"date":date};
        if(title == "" || date == "") return alert("모든 정보를 입력해주세요!");
        let last_data = this.itemList[idx];
        let year = this.getYear(date), last_year = this.getYear(last_data.date);
        let list = this.getLocal(year) == null ? [] : this.getLocal(year);

        this.since = year;
        this.setLocal("since",year);

        if(year !== last_year){
            this.itemList.splice(idx,1);
            this.setLocal(last_year,this.itemList);

            if(!this.itemList.length){
                this.removeLocal(last_year);
                this.navList.splice(this.navList.findIndex(x => x == last_year),1);
                this.setLocal("navList",this.navList);
            }

            list.push(data);
            list = this.dateSort(list);
            if(this.navList.findIndex(x=> x == year) == -1){
                this.navList.push(year);
                this.navList = this.navSort(this.navList);
                this.setLocal("navList",this.navList);
            }
            this.setLocal(year,list);
        }else{
            this.itemList[idx] = data;
            this.setLocal(year,this.itemList);
        }

        this.navList = this.navSort(this.navList);
        this.setLocal("navList",this.navList);

        this.itemList = this.getLocal(year);

        document.querySelector("#mod_close").click();
        alert("연혁이 수정되었습니다.");
        this.setting();
    }

    set_mod=e=>{
        let idx = e.target.dataset.idx;
        let data = this.itemList[idx];

        let form = document.querySelector("#mod_form");
        form.mod_title.value = data.title;
        form.mod_date.value = data.date;

        document.querySelector("#mod_history_btn").setAttribute("data-idx",idx);
    }

    del_proccess=e=>{
        let idx = e.target.dataset.idx;
        let data = this.itemList[idx];
        let year = this.getYear(data.date);
        if(confirm("해당 연혁을 삭제하시겠습니까?")){
            this.itemList.splice(idx,1);
            if(!this.itemList.length){
                this.removeLocal(year);
                this.navList.splice(this.navList.findIndex(x=> x == year),1);
                this.setLocal("navList",this.navList);
            }

            this.setLocal(year,this.itemList);
            this.setting();
        }
    }

    makeNav(x){
        let dom = document.createElement("div");
        let flag = this.since == x ? "select" : "";
        dom.innerHTML = `<div class="history_nav ${flag}">${x}</div>`;
        dom.querySelector(".history_nav").addEventListener("click",(e)=>{
            this.since = e.target.innerHTML;
            this.setLocal("since",this.since);
            this.itemList = this.getLocal(this.since);
            this.setting();
        });
        
        this.navArea.appendChild(dom.firstChild);
    }

    makeItem(date,title,idx){
        let month = this.getMonth(date);
        let day = this.getDay(date);

        let dom = document.createElement("div");
        dom.innerHTML = `<div class="history_item">
                            <h5><span>${month}.${day}</span> ${title}</h5>
                            <div class="history_box d-flex justify-content-center align-items-center">
                                <button data-target="#mod_popup" data-toggle="modal" data-idx="${idx}" class="mod_btn button full">수정</button>
                                <button data-idx="${idx}" class="del_btn button full red">삭제</button>
                            </div>
                        </div>`;
        dom.querySelector(".mod_btn").addEventListener("click",this.set_mod);
        dom.querySelector(".del_btn").addEventListener("click",this.del_proccess);
        this.itemArea.appendChild(dom.firstChild);
    }
}

let history = new History();