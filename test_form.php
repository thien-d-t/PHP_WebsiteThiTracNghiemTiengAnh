<?php 
session_start();
require 'config/connect.php';
$made = $_GET['made']??"";
$_SESSION['made'] = $made;
?>
<head>
    <link rel="stylesheet" href="./css/css_thi.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
   
</head>
<body >
<form action="ketqua.php" method="post" id="myForm">
    <div class="header-thi">
        <a id="dialog" class="btn-thoat">
            <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="100" height="100" viewBox="0,0,300,150"
            style="fill:#FFFFFF;width: 50px;height: 50px;margin-top: -15px;">
            <g fill="#ffffff" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><g transform="scale(3.55556,3.55556)"><path d="M36,12c-13.255,0 -24,10.745 -24,24c0,13.255 10.745,24 24,24c13.255,0 24,-10.745 24,-24c0,-13.255 -10.745,-24 -24,-24zM36,20c8.837,0 16,7.163 16,16c0,8.837 -7.163,16 -16,16c-8.837,0 -16,-7.163 -16,-16c0,-8.837 7.163,-16 16,-16zM42.36328,26.63477c-0.76788,0.00013 -1.53559,0.29341 -2.12109,0.87891l-4.24219,4.24414c-1.81485,-1.81474 -4.02952,-4.02985 -4.24219,-4.24219c-1.172,-1.171 -3.07214,-1.172 -4.24414,0c-1.172,1.172 -1.171,3.07119 0,4.24219l4.24219,4.24219l-4.24219,4.24219c-1.171,1.172 -1.172,3.07019 0,4.24219c1.172,1.172 3.07314,1.171 4.24414,0c0.21267,-0.21233 2.42734,-2.42745 4.24219,-4.24219l4.24219,4.24414c1.172,1.171 3.07019,1.172 4.24219,0c1.172,-1.172 1.171,-3.07314 0,-4.24414c-0.21233,-0.21267 -2.42745,-2.42734 -4.24219,-4.24219c1.81474,-1.81485 4.02985,-4.02952 4.24219,-4.24219c1.171,-1.172 1.172,-3.07214 0,-4.24414c-0.586,-0.586 -1.35322,-0.87903 -2.12109,-0.87891z"></path></g></g>
            </svg>
            <h2 style="color: #FFFFFF;position: relative;left: -5px;">Thoát</h2>
        </a>
        <h1 style="margin: -40px 0px 0px 650px;">Name: <?php echo$_SESSION['admin']['hoten']?></h1>
        <div style="display: flex; flex-direction: row;margin-left: 1100px;margin-top: 4.5px;">
            <svg style="margin: -34px 5px 0px 0px;" width="24" height="24" fill="#080808" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M12 6a7 7 0 1 0 0 14 7 7 0 0 0 0-14Zm-9 7a9 9 0 1 1 18 0 9 9 0 0 1-18 0Z" clip-rule="evenodd"></path>
                <path fill-rule="evenodd" d="M12 8a1 1 0 0 1 1 1v3.465l2.555 1.703a1 1 0 0 1-1.11 1.664l-3-2A1 1 0 0 1 11 13V9a1 1 0 0 1 1-1Z" clip-rule="evenodd"></path>
                <path fill-rule="evenodd" d="M17.293 2.293a1 1 0 0 1 1.414 0l3 3a1 1 0 0 1-1.414 1.414l-3-3a1 1 0 0 1 0-1.414Z" clip-rule="evenodd"></path>
                <path fill-rule="evenodd" d="M6.707 2.293a1 1 0 0 0-1.414 0l-3 3a1 1 0 0 0 1.414 1.414l3-3a1 1 0 0 0 0-1.414Z" clip-rule="evenodd"></path>
            </svg>
            <div  style="font-size: 25px;margin: -35px 0px 0px 0px;" id="countdown" >
                <span id="hours">00</span>:<span id="minutes">00</span>:<span id="seconds">00</span>
                <input type="hidden" id="data-hours" name="data-hours">
                <input type="hidden" id="data-minutes" name="data-minutes">
                <input type="hidden" id="data-seconds" name="data-seconds">
            </div>
        </div>
    </div>

        <div class="grid-container">
            <?php 
                $stm = $pdo->query("SELECT * FROM tbl_ctdethi JOIN tbl_cauhoi ON tbl_cauhoi.macauhoi = tbl_ctdethi.macauhoi 
                WHERE tbl_ctdethi.made = '$made'");
                $data = $stm->fetchAll(PDO::FETCH_OBJ);
                $i=1;
                $col = 2;
                $row = 1;
                if($stm->rowCount()>0){
                    foreach($data as $item){    
                        ?>
                            <div class="card-cauhoi" style="grid-row:<?php echo $i?>;"id="noidungcauhoi<?php echo $item->macauhoi?>">
                                <label style="font-size: 28px;"><?php echo $i?>. <?php echo $item->noidungcauhoi?></label>
                                <input style="display: none" type="text" name="macauhoi<?php echo $item->macauhoi?>" id="" value="<?php echo $item->macauhoi?>">
                                    <?php 
                                        $stmDapAn = $pdo->query("SELECT * FROM tbl_dapan JOIN tbl_cauhoi ON tbl_cauhoi.macauhoi = tbl_dapan.macauhoi 
                                        WHERE tbl_cauhoi.macauhoi = '$item->macauhoi'");
                                        $n = 1;
                                        $dataDapAn = $stmDapAn->fetchAll(PDO::FETCH_OBJ);
                                        if($stmDapAn->rowCount()>0){
                                            ?>
                                            <ol type="A" class="container">
                                            <?php
                                            foreach($dataDapAn as $itemDapAn){
                                                if($n <= $stmDapAn->rowCount()/2){
                                                    ?>
                                                    <li class="item"><?php echo $itemDapAn->noidungdapan?></li>
                                                    <?php
                                                }else{
                                                    ?>
                                                        <li class="item1"><?php echo $itemDapAn->noidungdapan?></li>
                                                    <?php
                                                }
                                            $n ++;  
                                            }
                                            ?>
                                            </ol>
                                            <?php
                                        }
                                    ?>

                                    <div class="body-dapan">
                                            <label style="font-size: 20px;color: #ffffff;position: relative;top:15px;left: 20px;">Đáp án của bạn: </label>
                                            <div class="radio-input">
                                                <?php 
                                                    $mang = array('A','B','C','D');
                                                    $a = 0;
                                                    $countMang = 1;
                                                    foreach($dataDapAn as $itemDapAn){
                                                        ?>
                                                            <input value="<?php echo $itemDapAn->madapan?>" name="value-radio<?php echo $item->macauhoi?>" id="value-<?php echo $item->macauhoi?><?php echo $countMang?>" type="radio">
                                                            <label for="value-<?php echo $item->macauhoi?><?php echo $countMang?>"><?php echo $mang[$a]?></label>
                                                        <?php
                                                        $a++;
                                                        $countMang++;
                                                    }
                                                ?>
                                            </div>
                                        
                                    </div>  
                            </div>
                            <?php
                            $i++;
                            }
                        }
                    ?>
        </div>
        <button onclick="checkRadioSelection()"class="btn-submit" id="btn-submit">
            <svg style="position: relative;top:5px" width="26" height="26" fill="#ffffff" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M14.25 2.5a.25.25 0 0 0-.25-.25H7A2.75 2.75 0 0 0 4.25 5v14A2.75 2.75 0 0 0 7 21.75h10A2.75 2.75 0 0 0 19.75 19V9.147a.25.25 0 0 0-.25-.25H15a.75.75 0 0 1-.75-.75V2.5Zm.75 9.75a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1 0-1.5h6Zm0 4a.75.75 0 0 1 0 1.5H9a.75.75 0 0 1 0-1.5h6Z" clip-rule="evenodd"></path>
            <path d="M15.75 2.824c0-.184.193-.301.336-.186.121.098.23.212.323.342l3.013 4.197c.068.096-.006.22-.124.22H16a.25.25 0 0 1-.25-.25V2.824Z"></path>
            </svg>
        Submit</button>
        

    <div class="card-list">
        <div style="margin: 30px;">
            <?php 
            $countList = 1;
            foreach($data as $item){
                ?>
                    <a href="#noidungcauhoi<?php echo $item->macauhoi?>" class="btn-show-cauhoi"><?php echo $countList?></a>
                <?php
                $countList++;
            }
            ?>
        </div>
    </div>
</form>
</body>

<script>
    const countdown = document.getElementById('countdown');
    const hoursSpan = document.getElementById('hours');
    const minutesSpan = document.getElementById('minutes');
    const secondsSpan = document.getElementById('seconds');

    let remainingSeconds;
    let intervalId;

    const remainingMinutes = <?php echo $_GET['timethi']; ?>; 
    remainingSeconds = remainingMinutes * 60;

    updateCountdown();

    intervalId = setInterval(updateCountdown, 1000);

    function updateCountdown() {
    remainingSeconds--;

    const hours = Math.floor(remainingSeconds / 3600);
    const minutes = Math.floor((remainingSeconds % 3600) / 60);
    const seconds = Math.floor(remainingSeconds % 60);

    hoursSpan.textContent = hours.toString().padStart(2, '0');
    minutesSpan.textContent = minutes.toString().padStart(2, '0');
    secondsSpan.textContent = seconds.toString().padStart(2, '0');

    if (remainingSeconds <= 0) {
        clearInterval(intervalId);
        alert('Đã hết thời gian!');
    }
    }
</script>
<script>
    const answerRadios = document.querySelectorAll('.radio-input');
    const answerBtns = document.querySelectorAll('.btn-show-cauhoi');

    answerRadios.forEach((radio, index) => {
        radio.addEventListener('click', () => {
            const correspondingBtn = answerBtns[index];
            answerBtns.forEach(btn => {
            });
            correspondingBtn.classList.add('selected');
        });
    });
</script>
<script>
    const links = document.querySelectorAll('.btn-show-cauhoi');

    for (const link of links) {
      link.addEventListener('click', function(event) {
        event.preventDefault();
        const targetPosition = document.getElementById(this.href.split('#')[1]);
        const targetTop = targetPosition.offsetTop - 100;
        window.scrollTo({
          top: targetTop,
          behavior: 'smooth'
        });
      });
    }
</script>

<script>
    const submitForm = document.getElementById('myForm');
    const data1Span = document.getElementById('hours');
    const data1Input = document.getElementById('data-hours');
    const data2Span = document.getElementById('minutes');
    const data2Input = document.getElementById('data-minutes');
    const data3Span = document.getElementById('seconds');
    const data3Input = document.getElementById('data-seconds');

    submitForm.addEventListener('submit', function(event) {

      // Transfer data from span elements to hidden inputs
      data1Input.value = data1Span.textContent;
      data2Input.value = data2Span.textContent;
      data3Input.value = data3Span.textContent;
      data4Input.value = data4Span.textContent;

      // Submit the form
      submitForm.submit(); // Or you can use xhr.send() for Ajax submission
    });
</script>
<script>
    function checkRadioSelection() {
        const questionGroups = document.querySelectorAll('.radio-input'); // Get all question groups

        // Check each question group for selection
        let anyQuestionUnanswered = false;
        for (const questionGroup of questionGroups) {
            const radioButtons = questionGroup.querySelectorAll('input[type="radio"]');

            // Check if any radio button is selected within the current question group
            let anyRadioSelected = false;
            for (const radioButton of radioButtons) {
            if (radioButton.checked) {
                anyRadioSelected = true; // Found a selected radio button in this question
                break; // Stop checking radios in this question if one is found
            }
            }

            // If no radio button is selected in the current question group, set the flag
            if (!anyRadioSelected) {
            anyQuestionUnanswered = true;
            break; // Stop checking questions if one is unanswered
            }
        }

        if (anyQuestionUnanswered) {
            Swal.fire({
                title: "There's some problem?",
                text: "Vui lòng trả lời hết câu hỏi",
                icon: "error"
            });
            event.preventDefault();
        }else{
            Swal.fire({
                title: "Xác nhận nộp bài",
                text: "Bạn có chắc chắn muốn nộp bài?",
                icon: "question",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButton: "Nộp bài",
                cancelButton: "Hủy",
                }).then((result) => {
                if (result.isConfirmed) {
                    
                } else {
                   
                }
                });
                
        }
    }
</script>

<script>
  document.getElementById("dialog").addEventListener('click', function(){
    Swal.fire({
    title: "Are you sure?",
    text: "Bạn có thật sự muốn thoát không??",
    icon: "question",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Yes, Hãy thoát!"
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = "index.php";
    }
  });
  })
</script>
