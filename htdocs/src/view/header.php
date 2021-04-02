<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>무형문화재관리원</title>
    <!-- 파일 -->
    <link rel="stylesheet" href="/resource/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="/resource/fontawesome/css/all.css">
    <link rel="stylesheet" href="/resource/css/style.css">

    <script src="/resource/js/jquery-3.5.1.min.js"></script>
    <script src="/resource/bootstrap/js/bootstrap.js"></script>
    <!-- /파일 -->
</head>
<body>
    <div id="wrap">
        <!-- 헤더 -->
        <input type="checkbox" name="main_open" hidden id="main_open" class="main_480">
        <header class="d-flex justify-content-between align-items-center flex-wrap">
            <!-- 유틸리티 -->
            <div id="util_area" class="d-flex justify-content-between align-items-center flex-wrap">
                <div id="util_left">
                    <i class="fas fa-bullhorn"></i>
                    <div id="util_slide">
                        <p>2020년 지역문화유산 활용 전문인력 교육(야행) 안내</p>
                        <p>2020년도 상반기 모범공무원 정부포상 추천후보자 공개검증 안내</p>
                        <p>국립문화재연구소 보존과학연구실 공무직 채용 공고</p>
                    </div>
                </div>
                <div id="util_right">
                    <a href="#">로그인</a><a href="#">회원가입</a><a href="#">문의하기</a>
                    <select name="lang" id="util_lang">
                        <option value="한국어">한국어</option>
                        <option value="English">English</option>
                        <option value="中文(简体)">中文(简体)</option>
                        <option value="日本語">日本語</option>
                    </select>
                </div>
            </div>
            <!-- /유틸리티 -->
            <!-- 로고 -->
            <a href="/" id="logo"></a>
            <!-- /로고 -->
            <!-- 네비게이션 pc -->
            <nav class="not_480">
                <ul class="d-flex justify-content-around align-items-center">
                    <li class="dep_1">
                        <a href="/">무형문화재관리원</a>
                        <ul class="dep_2">
                            <li><a href="#">소개</a></li>
                            <li>
                                <a href="#">일반현황</a>
                                <ul class="dep_3">
                                    <li><a href="#">설립목적</a></li>
                                    <li><a href="/history">연혁</a></li>
                                    <li><a href="#">역할</a></li>
                                </ul>
                            </li>
                            <li><a href="#">주요업무계획</a></li>
                            <li><a href="#">조직 및 구성</a></li>
                            <li><a href="/phone">전화번호</a></li>
                        </ul>
                    </li>
                    <li class="dep_1">
                        <a href="/cultures">무형문화재 현황</a>
                        <ul class="dep_2">
                            <li><a href="/cultures?bcode=전통 공연·예술">전통 공연·예술</a></li>
                            <li><a href="/cultures?bcode=전통기술">전통기술</a></li>
                            <li><a href="/cultures?bcode=전통지식">전통지식</a></li>
                            <li><a href="/cultures?bcode=구전 전통 및 표현">구전 전통 및 표현</a></li>
                            <li><a href="/cultures?bcode=전통 생활관습">전통 생활관습</a></li>
                            <li><a href="/cultures?bcode=의례·의식">의례·의식</a></li>
                            <li><a href="/cultures?bcode=전통 놀이·무예">전통 놀이·무예</a></li>
                            <li><a href="/cultures">전체 현황</a></li>
                        </ul>
                    </li>
                    <li class="dep_1">
                        <a href="#">행사 안내</a>
                        <ul class="dep_2">
                            <li>
                                <a href="#">공연</a>
                                <ul class="dep_3">
                                    <li><a href="/monthShow">월간 공연 일정</a></li>
                                    <li><a href="/yearShow">년간 공연 일정</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">전시</a>
                                <ul class="dep_3">
                                    <li><a href="#">관람 안내</a></li>
                                    <li><a href="#">전시실</a></li>
                                    <li><a href="#">디지털 체험관</a></li>
                                    <li><a href="#">기획 전시실</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">교육</a>
                                <ul class="dep_3">
                                    <li><a href="#">전문 교육</a></li>
                                    <li><a href="#">사회 교육</a></li>
                                    <li><a href="#">연간 교육일정</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dep_1">
                        <a href="#">전승지원</a>
                        <ul class="dep_2">
                            <li><a href="#">공방</a></li>
                            <li><a href="#">공예품 갤러리</a></li>
                            <li><a href="#">전수교육관 현황</a></li>
                        </ul>
                    </li>
                    <li class="dep_1">
                        <a href="#">데이터 공개</a>
                        <ul class="dep_2">
                            <li><a href="/openCulture">무형문화재 현황</a></li>
                            <li><a href="/openShow">월간/년간 공연현황</a></li>
                            <li><a href="#">공방/공예품/전수교육관 사진 자료</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /네비게이션 pc -->
            <!-- 검색 -->
            <div id="search_area">
                <div id="search_input">
                    <span>통합검색</span>
                    <input type="text" placeholder="검색할 단어를 입력해주세요." id="search">
                    <i class="fas fa-search"></i>
                </div>
            </div>
            <!-- /검색 -->
            <!-- 모바일 -->
            <label for="main_open" class="main_480" id="main_open_btn"><i class="fas fa-bars"></i></label>
            <!-- 모바일 네비게이션 -->
            <nav class="main_480">
                <ul>
                    <li class="dep_1">
                        <a href="/">무형문화재관리원</a>
                        <ul class="dep_2">
                            <li><a href="#">소개</a></li>
                            <li>
                                <a href="#">일반현황</a>
                                <ul class="dep_3">
                                    <li><a href="#">설립목적</a></li>
                                    <li><a href="/history">연혁</a></li>
                                    <li><a href="#">역할</a></li>
                                </ul>
                            </li>
                            <li><a href="#">주요업무계획</a></li>
                            <li><a href="#">조직 및 구성</a></li>
                            <li><a href="/phone">전화번호</a></li>
                        </ul>
                    </li>
                    <li class="dep_1">
                        <a href="/cultures">무형문화재 현황</a>
                        <ul class="dep_2">
                            <li><a href="/cultures?bcode=전통 공연·예술">전통 공연·예술</a></li>
                            <li><a href="/cultures?bcode=전통기술">전통기술</a></li>
                            <li><a href="/cultures?bcode=전통지식">전통지식</a></li>
                            <li><a href="/cultures?bcode=구전 전통 및 표현">구전 전통 및 표현</a></li>
                            <li><a href="/cultures?bcode=전통 생활관습">전통 생활관습</a></li>
                            <li><a href="/cultures?bcode=의례·의식">의례·의식</a></li>
                            <li><a href="/cultures?bcode=전통 놀이·무예">전통 놀이·무예</a></li>
                            <li><a href="/cultures">전체 현황</a></li>
                        </ul>
                    </li>
                    <li class="dep_1">
                        <a href="#">행사 안내</a>
                        <ul class="dep_2">
                            <li>
                                <a href="#">공연</a>
                                <ul class="dep_3">
                                    <li><a href="/monthShow">월간 공연 일정</a></li>
                                    <li><a href="/yearShow">년간 공연 일정</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">전시</a>
                                <ul class="dep_3">
                                    <li><a href="#">관람 안내</a></li>
                                    <li><a href="#">전시실</a></li>
                                    <li><a href="#">디지털 체험관</a></li>
                                    <li><a href="#">기획 전시실</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">교육</a>
                                <ul class="dep_3">
                                    <li><a href="#">전문 교육</a></li>
                                    <li><a href="#">사회 교육</a></li>
                                    <li><a href="#">연간 교육일정</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li class="dep_1">
                        <a href="#">전승지원</a>
                        <ul class="dep_2">
                            <li><a href="#">공방</a></li>
                            <li><a href="#">공예품 갤러리</a></li>
                            <li><a href="#">전수교육관 현황</a></li>
                        </ul>
                    </li>
                    <li class="dep_1">
                        <a href="#">데이터 공개</a>
                        <ul class="dep_2">
                            <li><a href="/openCulture">무형문화재 현황</a></li>
                            <li><a href="/openShow">월간/년간 공연현황</a></li>
                            <li><a href="#">공방/공예품/전수교육관 사진 자료</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /모바일 네비게이션 -->
            <!-- /모바일 -->
        </header>
        <!-- /헤더 -->