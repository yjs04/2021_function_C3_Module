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
            <!-- 연혁 -->
            <div class="container">
                <div class="content_wrap">
                    <div class="content_title">
                        <h2>연혁<span><i class="fas fa-home"></i> <i class="fas fa-angle-right"></i> 무형문화재관리원 <i class="fas fa-angle-right"></i> 일반현황 <i class="fas fa-angle-right"></i> 연혁</span></h2>
                    </div>
                    <div class="content_box" id="history">

                        <div id="history_header">
                            <div id="history_nav_area">
                            </div>
                            <button class="button" id="add_open" data-target="#add_popup" data-toggle="modal">연혁 등록</button>
                        </div>

                        <div id="history_wrap" class="d-flex">
                            <h5 id="history_title">2021</h5>
                            <div id="history_list">
                            </div>
                        </div>

                        <!-- add modal -->                        
                        <div class="modal popup fade" id="add_popup">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">연혁등록</h5>
                                        <button class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="add_form">
                                            <div class="form-group">
                                                <label for="add_title" class="form-label"><span class="text-danger mr-2">(*)</span>연혁 내용</label>
                                                <input type="text" id="add_title" name="add_title" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="add_date" class="form-label"><span class="text-danger mr-2">(*)</span>연혁 일자</label>
                                                <input type="date" id="add_date" name="add_date" class="form-control">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="button full gray" id="add_close" data-dismiss="modal">닫기</button>
                                        <button class="button full" id="add_history_btn">저장</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- add modal -->

                        <!-- mod modal -->                        
                        <div class="modal popup fade" id="mod_popup">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">연혁등록</h5>
                                        <button class="close" data-dismiss="modal">&times;</button>
                                    </div>
                                    <div class="modal-body">
                                        <form id="mod_form">
                                            <div class="form-group">
                                                <label for="mod_title" class="form-label"><span class="text-danger mr-2">(*)</span>연혁 내용</label>
                                                <input type="text" id="mod_title" name="mod_title" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="mod_date" class="form-label"><span class="text-danger mr-2">(*)</span>연혁일자</label>
                                                <input type="date" id="mod_date" name="mod_date" class="form-control">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="button full gray" id="mod_close" data-dismiss="modal">닫기</button>
                                        <button class="button full" id="mod_history_btn">저장</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- mod modal -->

                        <script src="resource/js/history.js"></script>

                    </div>
                </div>
            </div>
            <!-- /연혁 -->
        </div>
        <!-- /콘텐츠 -->