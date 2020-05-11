<?=$this->SetHeader()?>

    <main class="container feedBack">
        <div class="row over">
            <div class="col-12">
                <div class="feedbackTitle center">
                    <h1>Type your message to developer</h1>
                    <p>All of yours feedBacks is very important for me</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="from">
                <div class="col-2 right">
                    <p>From: </p>
                </div>
                <div class="col-10">
                    <input type="text" id="fromFeedBack" value="<?php
                    if(isset($_COOKIE['userName']))
                        print_r($_COOKIE['userName'])
                    ?>">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="textarea">
                <div class="col-12">
                    <textarea name="feedback text" id="textFeedBack" cols="30" rows="10"></textarea>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 SendFeedBack">
                <div class="sendButton" onclick="SendFeedBack()">Send your message</div>
            </div>
        </div>
    </main>
<?=$this->SetFooter()?>
