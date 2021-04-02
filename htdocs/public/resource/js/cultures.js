class Cultures{
    constructor(){
        this.AllitemList = [];
        this.itemList = [];
        this.itemArea = document.querySelector("#cultures_body");
        this.pageArea = document.querySelector("#cultures_buttons");

        this.page = 1;
        this.AllPage = 1;
        this.totalCount = 1;
        this.listLength = 8;
        this.BlockLength = 10;
        this.start = 1;
        this.end = 1;
        this.next = true;
        this.next_block = true;
        this.prev = true;
        this.prev_block = true;

        this.setting();
    }

    async setting(){
        this.AllitemList = await this.getXML();

        document.querySelector("#prev_block_btn").addEventListener("click",()=>{this.page = this.start - 1;this.setPagination()});
        document.querySelector("#prev_btn").addEventListener("click",()=>{this.page -= 1;this.setPagination()});
        document.querySelector("#next_btn").addEventListener("click",()=>{this.page += 1;this.setPagination()});
        document.querySelector("#next_block_btn").addEventListener("click",()=>{this.page = this.end + 1; this.setPagination();})

        this.setPagination();
    }

    setPagination(){
        this.totalCount = this.AllitemList.length;
        this.AllPage = Math.ceil(this.totalCount / this.listLength);
        let block = Math.ceil(this.page / this.BlockLength);
        this.end = block * this.BlockLength;
        this.start = this.end - this.BlockLength + 1;
        this.next = true;
        this.next_block = true;
        this.prev = true;
        this.prev_block = true;


        if(this.start <= 1){
            this.start = 1;
            this.prev_block = false;
        }

        if(this.end >= this.AllPage){
            this.end = this.AllPage;
            this.next_block = false;
        }

        this.next = this.page + 1  > this.AllPage ? false : true;
        this.prev = this.page - 1 < 1 ? false : true;
        
        if(this.next_block) $("#prev_block_btn").css({"display":"block"});
        else $("#prev_block_btn").css({"display":"none"});

        if(this.next) $("#next_btn").css({"display":"block"});
        else $("#next_btn").css({"display":"none"});

        if(this.prev_block) $("#prev_block_btn").css({"display":"block"});
        else $("#prev_block_btn").css({"display":"none"});

        if(this.next_block) $("#prev_btn").css({"display":"block"});
        else $("#prev").css({"display":"none"});

        this.itemList = this.AllitemList.slice((this.page - 1) * this.listLength,((this.page - 1) * this.listLength)+this.listLength);
        this.setPage();
    }

    setPage(){
        this.itemArea.innerHTML = "";
        this.pageArea.innerHTML = "";
        document.querySelector("#all_count").innerHTML = this.totalCount;
        document.querySelector("#now_page").innerHTML = this.page;
        document.querySelector("#all_page").innerHTML = this.AllPage;

        this.itemList.forEach(x=>{this.makeItem(x)});
        this.makePage();
    }

    makeItem({image,ccbaMnm1}){
        let dom = document.createElement("div");
        let img = image == "" ? "no Image" : `<img src="../xml/nihcImage/${image}" alt="image" title="image">`;
        dom.innerHTML = `<div class="card_items cultures_item">
                            <div class="culture_img">
                            ${img}
                            </div>
                            <h5 class="mt-3 text-center">${ccbaMnm1}</h5>
                        </div>`;
        this.itemArea.appendChild(dom.firstChild);
    }

    makePage(){
        for(let i = this.start; i <= this.end; i++){
            let dom = document.createElement("div");
            let flag = i == this.page ? "select" : "";
            dom.innerHTML = `<button class="page_btn ${flag}">${i}</button>`;
            dom.querySelector(".page_btn").addEventListener("click",e=>{this.page = e.target.innerHTML; this.setPagination()});
            this.pageArea.appendChild(dom.firstChild);  
        }
    }

    getXML(){
        return fetch("../xml/nihList.xml")
                .then(res => res.text())
                .then(async xml => {
                    let parser = new DOMParser();
                    let html = parser.parseFromString(xml,"text/html");
                    let totalCnt = html.querySelector("totalcnt").innerHTML;
                    let items = html.querySelectorAll("item");
                    let result = [];

                    for(let i = 0; i < totalCnt; i++){
                        let item = items[i];
                        let ccbaMnm1 = item.querySelector("ccbaMnm1").innerHTML;
                        ccbaMnm1 = ccbaMnm1.replace(/<!--\[CDATA\[/g,"");
                        ccbaMnm1 = ccbaMnm1.replace(/\]\]-->/g,"");
                        let ccbakdcd = item.querySelector("ccbakdcd").innerHTML;
                        let ccbactcd = item.querySelector("ccbactcd").innerHTML;
                        let ccbaasno = item.querySelector("ccbaasno").innerHTML;
                        let image = await this.getDetail(`../xml/detail/${ccbakdcd}_${ccbactcd}_${ccbaasno}.xml`);
                        result.push({"ccbaMnm1":ccbaMnm1,"ccbakdcd":ccbakdcd,"ccbactcd":ccbactcd,"ccbaasno":ccbaasno,"image":image});
                    }

                    return result;
                });
    }

    getDetail(url){
        return fetch(url)
                .then(res => res.text())
                .then(xml =>{
                    let parser = new DOMParser();
                    let html = parser.parseFromString(xml,"text/html");
                    let image = html.querySelector("imageUrl").innerHTML;
                    return image;
                });
    }

}

let culture = new Cultures();