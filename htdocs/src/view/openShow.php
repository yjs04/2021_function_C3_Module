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
                    <div class="content_box">
                        <div class="open_header">
                            <h5 class="m-0">전문주소 : /openAPI/showList.php</h5>
                        </div>
                        <div class="open_list">
                            <div class="open_wrap">
                                <h5 class="open_title">요청 전문 명세서</h5>
                                <table class="table_style">
                                    <thead>
                                        <tr>
                                            <th>항목명</th>
                                            <th>국문명</th>
                                            <th>필수</th>
                                            <th>샘플</th>
                                            <th>항목설명</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>searchType</td>
                                            <td>조회 구문</td>
                                            <td>필수</td>
                                            <td>M</td>
                                            <td>M : 월별, Y : 년도별</td>
                                        </tr>
                                        <tr>
                                            <td>year</td>
                                            <td>년도</td>
                                            <td>필수</td>
                                            <td>2021</td>
                                            <td>4자리 년도</td>
                                        </tr>
                                        <tr>
                                            <td>month</td>
                                            <td>월</td>
                                            <td>가변</td>
                                            <td>4</td>
                                            <td>월별 조회 시 필수(1~12)</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="open_wrap">
                                <h5 class="open_title">응답 전문 명세서</h5>
                                <table class="table_style">
                                    <thead>
                                        <tr>
                                            <th>항목명</th>
                                            <th>국문명</th>
                                            <th>필수</th>
                                            <th>샘플</th>
                                            <th>항목설명</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                            <td>searchType</td>
                                            <td>조회 구문</td>
                                            <td>필수</td>
                                            <td>M</td>
                                            <td>M : 월별, Y : 년도별</td>
                                        </tr>
                                        <tr>
                                            <td>year</td>
                                            <td>년도</td>
                                            <td>필수</td>
                                            <td>2021</td>
                                            <td>4자리 년도</td>
                                        </tr>
                                        <tr>
                                            <td>month</td>
                                            <td>월</td>
                                            <td>가변</td>
                                            <td>4</td>
                                            <td>월별 조회 시 필수(1~12)</td>
                                        </tr>
                                        <tr>
                                            <td>totalCount</td>
                                            <td>항목수</td>
                                            <td>필수</td>
                                            <td>17</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>items</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td>showUid</td>
                                            <td>공연 고유번호</td>
                                            <td>필수</td>
                                            <td>1</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>showName</td>
                                            <td>공연명</td>
                                            <td>필수</td>
                                            <td>2018-01-01 14:00</td>
                                            <td>공연일자 + 공연일시</td>
                                        </tr>
                                        <tr>
                                            <td>organizer</td>
                                            <td>주관</td>
                                            <td>-</td>
                                            <td>무형문화재관리원</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>place</td>
                                            <td>공연장소</td>
                                            <td>-</td>
                                            <td>얼쑤마루</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>cast</td>
                                            <td>출연진</td>
                                            <td>-</td>
                                            <td>미정</td>
                                            <td>-</td>
                                        </tr>
                                        <tr>
                                            <td>rm</td>
                                            <td>공연내용</td>
                                            <td>-</td>
                                            <td>-</td>
                                            <td>-</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /무형문화재 현황 -->
        </div>
        <!-- /콘텐츠 -->