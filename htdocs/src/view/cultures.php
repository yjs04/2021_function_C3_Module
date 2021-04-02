<!-- 비쥬얼 -->
<div id="visual">
            <div class="visual_slide"><img src="resource/image/visual4.jpg" alt="visual_slide" title="visual_slide"></div>
            <div class="visual_slide"><img src="resource/image/visual5.jpg" alt="visual_slide" title="visual_slide"></div>
            <div class="visual_slide"><img src="resource/image/visual6.jpg" alt="visual_slide" title="visual_slide"></div>
            <div id="visual_bc"></div>
            <div class="visual_text">
                <div class="visual_text_box">
                    <h2 class="visual_title">과거를 잇고 미래로 나아가는 무형문화재관리원</h2>
                </div>
            </div>
            <div id="visual_slide_box">
                <div class="visual_slide_btn"></div>
                <div class="visual_slide_btn"></div>
                <div class="visual_slide_btn"></div>
            </div>
        </div>
        <!-- /비쥬얼 -->

        <!-- 콘텐츠 -->
        <div id="content">
            <!-- 무형문화재 현황 -->
            <div class="container">
                <div class="content_wrap">
                    <div class="content_title">
                        <h2>무형문화재 현황<span><i class="fas fa-home"></i> <i class="fas fa-angle-right"></i> 무형문화재 현황</span></h2>
                    </div>
                    <div class="content_box" id="cultures">

                        <div id="cultures_header" class="d-flex justify-content-between align-items-center">
                            <h5 id="cultures_page_info">총<span id="all_count">154</span>건 <span id="now_page">1</span>p / <span id="all_page">16</span>p</h5>
                            <div id="cultures_type_wrap" class="d-flex justify-content-center align-items-center">
                                <button class="button mr-3" id="add_culture">등록</button>
                                <button data-href="/cultures?type=list<?=$data['bcode'] == "" ? "" : "&bcode=".$data["bcode"]?>" class="button full list_type <?=$data["type"] == "list" ? "select" : ""?>">목록</button>
                                <button data-href="/cultures?type=album<?=$data['bcode'] == "" ? "" : "&bcode=".$data["bcode"]?>" class="button full list_type <?=$data["type"] == "album" ? "select" : ""?>">앨범</button>
                            </div>
                        </div>

                        <div id="cultures_body" class="<?=$data['type']?>">
                        <?php if($data['type'] == "list"):?>
                            <table class="table_style">
                                <thead>
                                    <tr>
                                        <th>순번</th>
                                        <th>종목</th>
                                        <th>명칭</th>
                                        <th>소재지</th>
                                        <th>관리자(단체)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($data['item']['items'] as $item):?>
                                    <tr>
                                        <td><?=$item->sn?></td>
                                        <td><?=$item->ccmaName?></td>
                                        <td class="listName" data-idx="<?=$item->sn?>"><?=$item->ccbaMnm1?><?=$item->ccbaMnm2 == "" ? "" : "(".$item->ccbaMnm2.")"?></td>
                                        <td><?=$item->ccbaLcad?></td>
                                        <td><?=$item->ccbaAdmin?></td>
                                    </tr>
                                <?php endforeach;?>
                                </tbody>
                            </table>
                        <?php else:?>
                        <?php foreach($data['item']['items'] as $item):?>
                            <div class="card_items cultures_item">
                                <div class="culture_img" data-idx="<?=$item->sn?>">
                                <?php if($item->image == ""):?>
                                    no Image
                                <?php else:?>
                                    <img src="/image?name=<?=$item->image?>" alt="image" title="image">
                                <?php endif;?>
                                </div>
                                <h5 class="mt-3 text-center"><?=$item->ccbaMnm1?><?= $item->ccbaMnm2 == "" ? "" : "(".$item->ccbaMnm2.")"?></h5>
                            </div>
                        <?php endforeach;?>
                        <?php endif;?>
                        </div>

                        <div id="culture_footer" class="d-flex justify-content-center align-items-center mt-4">
                            <?php if($data['item']['prev_block']):?>
                            <button data-href="/cultures?page=<?=$data['item']['start']-1?><?="&type=".$data['type']?><?=$data['bcode']=="" ? "" : "&bcode=".$data['bcode']?>" id="prev_block_btn" class="page_btn"><i class="fas fa-angle-double-left"></i></button>
                            <?php endif;?>
                            <?php if($data['item']['prev']):?>
                            <button data-href="/cultures?page=<?=$data['item']['page']-1?><?="&type=".$data['type']?><?=$data['bcode']=="" ? "" : "&bcode=".$data['bcode']?>" id="prev_btn" class="page_btn"><i class="fas fa-angle-left"></i></button>
                            <?php endif;?>
                            <div id="cultures_buttons" class="d-flex justify-content-center align-items-center ml-3 mr-3">
                            <?php for($i = $data['item']['start']; $i <= $data['item']['end']; $i++):?>
                            <button class="page_btn <?=$i == $data['item']['page'] ? "select" : ""?>" data-href="/cultures?page=<?=$i?><?="&type=".$data['type']?><?=$data['bcode']=="" ? "" : "&bcode=".$data['bcode']?>"><?=$i?></button>
                            <?php endfor;?>
                            </div>
                            <?php if($data['item']['next']):?>
                            <button id="next_btn" class="page_btn" data-href="/cultures?page=<?=$data['item']['page']+1?><?="&type=".$data['type']?><?=$data['bcode']=="" ? "" : "&bcode=".$data['bcode']?>"><i class="fas fa-angle-right"></i></button>
                            <?php endif;?>
                            <?php if($data['item']['next_block']):?>
                            <button id="next_block_btn" class="page_btn" data-href="/cultures?page=<?=$data['item']['end']+1?><?="&type=".$data['type']?><?=$data['bcode']=="" ? "" : "&bcode=".$data['bcode']?>"><i class="fas fa-angle-double-right"></i></button>
                            <?php endif;?>
                        </div>

                        <!-- <script src="resource/js/cultures.js"></script> -->

                    </div>
                </div>
            </div>
            <!-- /무형문화재 현황 -->
        </div>
        <!-- /콘텐츠 -->

        <script>
            document.querySelectorAll(".page_btn").forEach(x=>{
                x.addEventListener("click",e=>{
                    location.href=e.target.dataset.href;
                });
            })

            document.querySelectorAll(".list_type").forEach(x=>{
                x.addEventListener("click",e=>{
                    location.href = e.target.dataset.href;
                });
            });
            if(document.querySelector(".culture_img")){
                document.querySelectorAll(".culture_img").forEach(x=>{
                    x.addEventListener("click",e=>{
                        let idx = e.currentTarget.dataset.idx;
                        location.href="/modCulture/"+idx;
                    });
                });
            }
            if(document.querySelector(".listName")){
                document.querySelectorAll(".listName").forEach(x=>{
                    x.addEventListener("click",e=>{
                        let idx = e.currentTarget.dataset.idx;
                        location.href="/modCulture/"+idx;
                    });
                });
            }

            document.querySelector("#add_culture").addEventListener("click",e=>{location.href="/addCulture";});
        </script>