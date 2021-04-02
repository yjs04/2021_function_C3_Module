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

        <div id="content">
            <div class="container">
                <div class="content_wrap">
                    <div class="content_title">
                        <h2>년간 공연 일정 <span><i class="fas fa-home"></i> <i class="fas fa-angle-right"></i> 행사 안내 <i class="fas fa-angle-right"></i> 년간 공연 일정</span></h2>
                    </div>
                    <div class="content_box">
                        <div id="year_header" class="mb-2 d-flex justify-content-center align-items-center position-relative">
                            <button class="page_btn" data-href="/yearShow?year=<?=$prev?>"><i class="fas fa-angle-left"></i></button>
                            <h5 class="font-weight-bold ml-2 mr-2"><?=$year?></h5>
                            <button class="page_btn" data-href="/yearShow?year=<?=$next?>"><i class="fas fa-angle-right"></i></button>
                            <button class="button position-absolute" id="add_btn" style="right:0;top:0;">일정 등록</button>
                        </div>
                        <div id="year_body" class="d-flex justify-content-between flex-wrap">
                            <?php for($i = 1; $i <=12; $i++):?>
                            <div class="year_item">
                                <h5 class="year_title"><?=$i?></h5>
                                <div class="year_list">
                                    <?php foreach($data as $item):?>
                                    <?php if(date("m",strtotime($item->showDate)) == $i):?>
                                    <div class="year_title"  data-idx="<?=$item->showUid?>">
                                        <p class="title" style="cursor:pointer;" data-idx="<?=$item->showUid?>"><?=date("m",strtotime($item->showDate)).".".date("d",strtotime($item->showDate))?> <span class="ml-3" data-idx="<?=$item->showUid?>"><?=$item->showName?></span></p>
                                    </div>
                                    <?php endif;?>
                                    <?php endforeach;?>
                                </div>
                            </div>
                            <?php endfor;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.querySelectorAll(".page_btn").forEach(x=>{
                x.addEventListener("click",e=>{
                    location.href = e.target.dataset.href;
                });
            });

            document.querySelector("#add_btn").addEventListener("click",e=>{location.href="/addShow";})
            document.querySelectorAll(".year_title .title").forEach(x=>{
                x.addEventListener("click",e=>{
                    let idx = e.target.dataset.idx;
                    location.href= "/modShow/"+idx;
                });
            })
        </script>
