<?php

include('./php/config.php');

$voice = array('ｴﾈﾐｰｷｨﾙ','全滅です','意味ﾜｶﾝﾈｴｶﾞ','死ね！','いらんでしょ','壊れる','おじいさん','戻った','だめ','富豪かよ','ブルスク','あ～','死ね未成年','コケッコッコ');
?>

<!DOCTYPE html>
<html>
<!-- Global site tag (gtag.js) - Google Analytics -->
<head>
    <!-- GAタグ 自由に -->
    <script type="text/javascript">

    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-37774845-1']);
    _gaq.push(['_trackPageview']);

    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
    </script>

    <!-- fontawesomeライブラリ -->
    <script src="https://kit.fontawesome.com/7e9be2a80d.js" crossorigin="anonymous"></script>

    <title><?php echo SERVER_USER_NAME ?>ボイス集 | <?php echo SERVER_SITE_NAME ?></title>
    <link rel="stylesheet" href="<?php echo SERVER_URL ?>css/common.css" title="なんかつくるか">

    <!-- jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito|Oswald|Prociono|Abril+Fatface|Work+Sans|Righteous|Open+Sans+Condensed:700|Open+Sans:400,800|Lobster" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <!-- viewportとか -->
    <meta name="msapplication-config" content="/favicon/browserconfig.xml">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <meta name="keywords" content="<?php echo SERVER_USER_NAME ?>">
    <meta name="description" content="適当に">
    <meta name="robots" content="all">
</head>

<body>

<div id="background">

    <div id="pan_list">
        <p>Tarkovから逃げるな | <?php echo SERVER_DOMAIN ?></p>
    </div>

    <div id="blur">

        <div id="wrapper">

            <div id="header_wrapper">

                <header>
                    <h1><?php echo SERVER_SITE_NAME ?></h1>
                    <p>ようこそ！ここは<?php echo SERVER_USER_NAME ?>の声を再生できるサイトです</p>
                </header>

            </div>

            <div id="main_wrapper">

                <article class="index">
                    再生ボタンを押すと声が再生されます。
                </article>
                <ul id="user_voice">

                    <?php foreach($voice as $num => $v){ ?>

                    <li id="obj_sound_<?php echo $num; ?>">
                        
                        <p id="js-copytext" style="display:none;"><?php echo SERVER_URL . SERVER_VOICE_URL . $num . '.mp3'; ?></p>
                        <button class="discord" type="button" id="js-copybtn">
                            <i class="far fa-clipboard"></i>
                        </button>
                        <p id="js-copyalert" class="copy_alert">コピーできました！</p>

                        <p>
                            <a href="javascript:void(0);">
                                <span id="btn_sound_<?php echo $num; ?>">
                                    <i class="fa fa-play" aria-hidden="true"></i>
                                </span>
                            </a>
                        </p>

                        <p class="title_<?php echo $num; ?>"><?php echo $v;?></p>
                    </li>

                    <audio id="target_btn_sound_<?php echo $num; ?>" preload="none">
                        <source src="./voice/bluehawk/<?php echo $num; ?>.mp3"  type="audio/mp3"/>
                    </audio>

                    <?php } ?>

                </ul>

            </div>

        </div>

        <div id="footer_wraqpper">
            <footer>
                <address>copyright&copy; <?php echo SERVER_DOMAIN ?> <?php echo date('Y') ?>.</address>
            </footer>
        </div>

        <div class="scroll_button">
            <p><i class="fas fa-arrow-circle-up"></i></p>
        </div>

        <div class="volume-button">
            <ul>
                <li></li>
            </ul>
        </div>

    </div>

</div>

<script type="text/javascript">

function url_copy(obj){
    var voiceUrl = obj.firstChild;
    voiceUrl.getAttribute('value').select();
    document.execCommand("copy");
}

$(function() {
    $('#js-copybtn').on('click', function(){
        let text = $('#js-copytext').text();
        let $textarea = $('<textarea></textarea>');
        $textarea.text(text);
        $(this).append($textarea);
        $textarea.select();
        document.execCommand('copy');
        $textarea.remove();
        $('#js-copyalert').show().delay(2000).fadeOut(400);
    });
});

//media再生
(function (window, $) {
  'use strict';

  $.fn.useSound = function (event, selector) {
    var audio_tag = $(selector)[0];
    if(audio_tag == undefined) {
        return this;
    }
    this.on(event, function(e){
      e.preventDefault();
      audio_tag.volume = 0.5;
      //ON,OFFの判定
      if(audio_tag.paused) {
        $("i", this).attr('class', "fa fa-pause");
        $(this).attr('class', "do");
        audio_tag.play();
        audio_tag.loop = true;
      } else {
        $("i",this).attr('class', "fa fa-play");
        $(this).removeClass("do");
        audio_tag.pause();
        audio_tag.currentTime = 0;
        audio_tag.loop = false;
      }
    });
    return this;
  };

})(this, this.jQuery);

$(function() {

    // 再生に関してのやつ
    $('#user_voice span').each(function(i) {
        var e = $(this);
        var id = e.attr("id");
        e.addClass("btn_2");
        e.useSound('mousedown touchend', "#target_" + id);
    });

});
</script>
</body>
</html>
