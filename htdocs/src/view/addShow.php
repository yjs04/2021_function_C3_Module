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
                        <h2>공연 일정 등록 <span><i class="fas fa-home"></i> <i class="fas fa-angle-right"></i> 행사 안내 <i class="fas fa-angle-right"></i> 행사 등록</span></h2>
                    </div>
                    <div class="content_box">
                        <form action="/addShowProccess" method="post" id="add_show">
                            <div class="form-group"><label for="showName" class="form-label"><span class="text-danger">(*)</span> 공연명</label><input type="text" name="showName" class="form-control" required></div>
                            <div class="form-group"><label for="showDate" class="form-label"><span class="text-danger">(*)</span> 공연일</label><input type="date" name="showDate" class="form-control" required></div>
                            <div class="form-group"><label for="showTime" class="form-label"><span class="text-danger">(*)</span> 공연시간</label><input type="time" name="showTime" class="form-control" required></div>
                            <div class="form-group"><label for="organizer" class="form-label">주관</label><input type="text" name="organizer" class="form-control"></div>
                            <div class="form-group"><label for="place" class="form-label">공연장소</label><input type="text" name="place" class="form-control"></div>
                            <div class="form-group"><label for="cast" class="form-label">출연진</label><input type="text" name="cast" class="form-control"></div>
                            <div class="form-group"><label for="rm" class="form-label">공연내용</label><textarea name="rm" cols="30" rows="10" class="form-control"></textarea></div>
                            <button class="button full float-right">일정 등록</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>