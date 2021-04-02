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
            <!-- 월간 공연 일정 -->
            <div class="container">
                <div class="content_wrap">
                    <div class="content_title">
                        <h2>월간 공연 일정 <span><i class="fas fa-home"></i> <i class="fas fa-angle-right"></i> 행사 안내 <i class="fas fa-angle-right"></i> 공연 <i class="fas fa-angle-right"></i> 월간 공연 일정</span></h2>
                    </div>
                    <div class="content_box" id="calendar">
                        <div id="calendar_header" class="position-relative d-flex justify-content-center align-items-center ">
                            <button class="page_btn" data-href="<?=$calendar['prevQ']?>"><i class="fas fa-angle-left"></i></button>
                            <h5 class="font-weight-bold ml-2 mr-2 mb-0"><?=$year?>.<?=$month?></h5>
                            <button class="page_btn" data-href="<?=$calendar['nextQ']?>"><i class="fas fa-angle-right"></i></button>
                            <button id="add_show" class="button position-absolute" style="top:0;right:0;">일정등록</button>
                        </div>

                        <div id="calendar_body" class="mt-3">
                            <table id="calendar_table">
                                <thead>
                                    <tr>
                                        <th>Sun</th>
                                        <th>Mon</th>
                                        <th>Tue</th>
                                        <th>Wed</th>
                                        <th>Thr</th>
                                        <th>Fri</th>
                                        <th>Sat</th>
                                    </tr>
                                </thead>
                                <?php var_dump($data);?>
                                <tbody>
                                    <?php $day = $calendar['start'];?>
                                    <?php while($day <= $calendar['end']):?>
                                    <?php if(date("w",$day) == 0):?>
                                    <tr>
                                    <?php endif;?>
                                    <td>
                                        <p><?=date("d",$day)?></p>
                                        <div class="calendar_list">
                                            <?php foreach($data as $item):?>
                                            <?php if($item->showDate == date("Y-m-d",$day)):?>
                                            <p class="calendar_item m-0" data-idx="<?=$item->showUid?>"><?=$item->showName?></p>
                                            <?php endif;?>
                                            <?php endforeach;?>
                                        </div>
                                    </td>
                                    <?php if(date("w",$day) == 6):?>
                                    </tr>
                                    <?php endif;?>
                                    <?php $day = strtotime(date("Y-m-d",$day)."+1 day");?>
                                    <?php endwhile; ?>
                                </tbody>
                            </table>
                        </div>
                        
                    </div>
                </div>
            </div>
            <!-- /월간 공연 일정 -->
        </div>
        <!-- /콘텐츠 -->
        
        <script>
            document.querySelectorAll(".page_btn").forEach(x=>{
                x.addEventListener("click",e=>{location.href=e.target.dataset.href});
            });

            document.querySelector("#add_show").addEventListener("click",()=>{location.href="/addShow";})
            document.querySelectorAll(".calendar_item").forEach(x=>{
                x.addEventListener("click",e=>{
                    let idx = e.currentTarget.dataset.idx;
                    location.href="/modShow/"+idx;
                });
            });
        </script>
