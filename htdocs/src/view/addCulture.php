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
                        <h2>무형문화재 등록<span><i class="fas fa-home"></i> <i class="fas fa-angle-right"></i> 무형문화재 현황 <i class="fas fa-angle-right"></i> 무형문화재 등록</span></h2>
                    </div>
                    <div class="content_box">
                        <form action="/addCultureProccess" method="post" id="add_form"  enctype="multipart/form-data">
                            <div class="form-group"><label for="no" class="form-label"><span class="text-danger">(*)</span>고유 키값</label><input type="text" class="form-control" name="no" required></div>
                            <div class="form-group"><label for="ccmaName" class="form-label"><span class="text-danger">(*)</span>문화재종목</label><input type="text" class="form-control" name="ccmaName" required></div>
                            <div class="form-group"><label for="crltsnoNm" class="form-label"><span class="text-danger">(*)</span>지정호수</label><input type="text" class="form-control" name="crltsnoNm" required></div>
                            <div class="form-group"><label for="ccbaMnm1" class="form-label"><span class="text-danger">(*)</span>문화재명</label><input type="text" class="form-control" name="ccbaMnm1" required></div>
                            <div class="form-group"><label for="ccbaMnm2" class="form-label">문화재명(한자)</label><input type="text" class="form-control" name="ccbaMnm2"></div>
                            <div class="form-group"><label for="ccbaCtcdNm" class="form-label">시도명</label><input type="text" class="form-control" name="ccbaCtcdNm"></div>
                            <div class="form-group"><label for="ccsiName" class="form-label">시군구명</label><input type="text" class="form-control" name="ccsiName"></div>
                            <div class="form-group"><label for="ccbaAdmin" class="form-label">관리자</label><input type="text" class="form-control" name="ccbaAdmin"></div>
                            <div class="form-group"><label for="ccbaKdcd" class="form-label"><span class="text-danger">(*)</span>종목코드</label><input type="text" class="form-control" name="ccbaKdcd" required></div>
                            <div class="form-group"><label for="ccbaAsno" class="form-label"><span class="text-danger">(*)</span>지정번호</label><input type="text" class="form-control" name="ccbaAsno" required></div>
                            <div class="form-group"><label for="ccbaCtcd" class="form-label"><span class="text-danger">(*)</span>시도코드</label><input type="text" class="form-control" name="ccbaCtcd" required></div>
                            <div class="form-group"><label for="ccbaCncl" class="form-label mr-3">지정해제여부</label>N <input type="radio" name="ccbaCncl" value="N" class="pr-2 pl-2" > Y <input type="radio" name="ccbaCncl" value="Y" class="pl-1"></div>
                            <div class="form-group"><label for="ccbaCpno" class="form-label">문화재연계번호</label><input type="text" class="form-control" name="ccbaCpno"></div>
                            <div class="form-group"><label for="longitude" class="form-label">경도</label><input type="text" class="form-control" name="longitude"></div>
                            <div class="form-group"><label for="latitude" class="form-label">위도</label><input type="text" class="form-control" name="latitude"></div>
                            <div class="form-group"><label for="gcodeName" class="form-label">문화재분류</label><input type="text" class="form-control" name="gcodeName"></div>
                            <div class="form-group"><label for="bcodeName" class="form-label">문화재분류2(종류)</label><select name="bcodeName" class="form-control"><option value="전통 공연·예술" nam>전통 공연·예술</option><option value="전통기술">전통기술</option><option value="전통지식">전통지식</option><option value="구전 전통 및 표현">구전 전통 및 표현</option><option value="전통 생활관습">전통 생활관습</option><option value="의례·의식">의례·의식</option><option value="전통 놀이·무예">전통 놀이·무예</option></select></div>
                            <div class="form-group"><label for="scodeName" class="form-label">문화재분류3</label><input type="text" class="form-control" name="scodeName"></div>
                            <div class="form-group"><label for="mcodeName" class="form-label">문화재분류4</label><input type="text" class="form-control" name="mcodeName"></div>
                            <div class="form-group"><label for="ccbaQuan" class="form-label">수량</label><input type="text" class="form-control" name="ccbaQuan"></div>
                            <div class="form-group"><label for="ccbaAsdt" class="form-label">지정(등록일)</label><input type="date" class="form-control" name="ccbaAsdt"></div>
                            <div class="form-group"><label for="ccbaLcad" class="form-label">소재지 상세</label><input type="text" class="form-control" name="ccbaLcad"></div>
                            <div class="form-group"><label for="ccceName" class="form-label">시대</label><input type="text" class="form-control" name="ccceName"></div>
                            <div class="form-group"><label for="ccbaPoss" class="form-label">소유지</label><input type="text" class="form-control" name="ccbaPoss"></div>
                            <div class="form-group"><label for="ccbaCndt" class="form-label">지정해제일</label><input type="date" class="form-control" name="ccbaCndt"></div>
                            <div class="form-group"><label for="image" class="form-label">이미지</label><input type="file" class="form-control" name="image"></div>
                            <div class="form-group"><label for="content" class="form-label">설명</label><textarea name="content" cols="30" rows="10" class="form-control"></textarea></div>
                            <button class="button full float-right">등록하기</button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /무형문화재 현황 -->
        </div>
        <!-- /콘텐츠 -->