<!-- 发请求, 获取数据 -->
<?php
require_once("admin/api/tools/doSql.php");

$sql = "select * from sliders";
$sliderList = my_select($sql);

$sql = "select id, title, feature, views, likes  from posts where status = 'published' order by views desc limit 5";

$hotPosts = my_select($sql);
// var_dump($hotPosts);

//获取三个最新的文章
$sql = "select p.id, c.name, p.title, u.nickname, p.created, p.content, p.views, p.likes from posts p
        inner join categories c
        on p.category_id = c.id
        inner join users u
        on p.user_id = u.id
        where p.status = 'published'
        order by p.id desc
        limit 3";
$newPosts = my_select($sql);

?>


<!DOCTYPE html>
<html lang="zh-CN">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>阿里百秀-发现生活，发现美!</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/vendors/font-awesome/css/font-awesome.css">
  <style>
  .swipe-wrapper li img {
    height : 273px;
  }
  
  
  </style>
</head>
<body>
  <div class="wrapper">
    <div class="topnav">
      <ul>
        <li><a href="javascript:;"><i class="fa fa-glass"></i>奇趣事</a></li>
        <li><a href="javascript:;"><i class="fa fa-phone"></i>潮科技</a></li>
        <li><a href="javascript:;"><i class="fa fa-fire"></i>会生活</a></li>
        <li><a href="javascript:;"><i class="fa fa-gift"></i>美奇迹</a></li>
      </ul>
    </div>
    <div class="header">
      <h1 class="logo"><a href="index.html"><img src="assets/img/logo.png" alt=""></a></h1>
      <ul class="nav">
        <li><a href="javascript:;"><i class="fa fa-glass"></i>奇趣事</a></li>
        <li><a href="javascript:;"><i class="fa fa-phone"></i>潮科技</a></li>
        <li><a href="javascript:;"><i class="fa fa-fire"></i>会生活</a></li>
        <li><a href="javascript:;"><i class="fa fa-gift"></i>美奇迹</a></li>
      </ul>
      <div class="search">
        <form>
          <input type="text" class="keys" placeholder="输入关键字">
          <input type="submit" class="btn" value="搜索">
        </form>
      </div>
      <div class="slink">
        <a href="javascript:;">链接01</a> | <a href="javascript:;">链接02</a>
      </div>
    </div>
    <div class="aside">
      <div class="widgets">
        <h4>搜索</h4>
        <div class="body search">
          <form>
            <input type="text" class="keys" placeholder="输入关键字">
            <input type="submit" class="btn" value="搜索">
          </form>
        </div>
      </div>
      <div class="widgets">
        <h4>随机推荐</h4>
        <ul class="body random">
          <?php 
          require_once("admin/api/tools/doSql.php");
          
          $sql = "select id, title, views, feature from posts 
                where status = 'published' 
                order by rand() limit 5";
          
          $randPostList = my_select($sql);
          // var_dump($randPostList);

          foreach($randPostList as $value) : ?>
          <li>
            <a href="detail.php?id=<?php echo $value['id']?>">
              <p class="title"><?php echo $value['title']?></p>
              <p class="reading">阅读(<?php echo $value['views']?>)</p>
              <div class="pic">
                <img src="<?php echo $value['feature']?>" alt="">
              </div>
            </a>
          </li>
        <?php endforeach;?>
        </ul>
      </div>
      <div class="widgets">
        <h4>最新评论</h4>
        <ul class="body discuz">
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_2.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_2.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <div class="avatar">
                <img src="uploads/avatar_1.jpg" alt="">
              </div>
              <div class="txt">
                <p>
                  <span>鲜活</span>9个月前(08-14)说:
                </p>
                <p>挺会玩的</p>
              </div>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="content">
      <div class="swipe">
        <ul class="swipe-wrapper">
          <!-- 遍历数组 -->
          <?php foreach($sliderList  as $value) : ?>
          
          <li>
            <a href="<?php echo $value['link']?>">
              <img src="<?php echo $value['image']?>">
              <span><?php echo $value['text']?></span>
            </a>
          </li>
          <?php endforeach;?>
        </ul>
        <p class="cursor">
          <?php foreach ($sliderList as $key => $value) :
          ?>
          <?php if ($key == 0) : ?>
          <span class="active"></span>
            <?php else : ?>
            <span></span>
          <?php endif;?>
          <?php endforeach;?>
          </p>
        <a href="javascript:;" class="arrow prev"><i class="fa fa-chevron-left"></i></a>
        <a href="javascript:;" class="arrow next"><i class="fa fa-chevron-right"></i></a>
      </div>
      <div class="panel focus">
        <h3>焦点关注</h3>
        <ul>
        <?php foreach($hotPosts as $key => $value) : ?>
        <?php if ($key == 0) : ?>
          <li class="large">
            <?php else : ?>
            <li>
          <?php endif;?>
            <a href="detail.php?id=<?php echo $value['id']?>">
              <img src="<?php echo $value['feature']?>" alt="">
              <span><?php echo $value['title']?></span>
            </a>
          </li>
          <?php endforeach;?> 
        </ul>
      </div>
      <div class="panel top">
        <h3>一周热门排行</h3>
        <ol>
          <?php for ($i=0; $i < 4; $i++) : ?>
          <li>
            <i><?php echo $i?></i>
            <a href="detail.php?id=<?php echo $hotPosts[$i]["id"]?>"><?php echo $hotPosts[$i]["title"]?></a>
            <a href="javascript:void(0);" postID="<?php echo $hotPosts[$i]["id"]?>" class="like">赞(<?php echo $hotPosts[$i]["likes"]?>)</a>
            <span>阅读 (<?php echo $hotPosts[$i]["views"]?>)</span>
          </li>
          <?php endfor;?>
        </ol>
      </div>
      <div class="panel hots">
        <h3>热门推荐</h3>
        <ul>
          <li>
            <a href="javascript:;">
              <img src="uploads/hots_2.jpg" alt="">
              <span>星球大战:原力觉醒视频演示 电影票68</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <img src="uploads/hots_3.jpg" alt="">
              <span>你敢骑吗？全球第一辆全功能3D打印摩托车亮相</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <img src="uploads/hots_4.jpg" alt="">
              <span>又现酒窝夹笔盖新技能 城里人是不让人活了！</span>
            </a>
          </li>
          <li>
            <a href="javascript:;">
              <img src="uploads/hots_5.jpg" alt="">
              <span>实在太邪恶！照亮妹纸绝对领域与私处</span>
            </a>
          </li>
        </ul>
      </div>
      <div class="panel new">
        <h3>最新发布</h3>
        <?php foreach ($newPosts as $value) : 
          //在循环中获取评论数, 因为在外面获取不到文章的id
          $id = $value['id'];

          $sql = "select * from comments where status = 'approved' and post_id = $id";

          $conmmentsCount = count(my_select($sql));
        
          ?>

        <div class="entry">
          <div class="head">
            <span class="sort"><?php echo $value["name"]?></span>
            <a href="javascript:;"><?php echo $value["title"]?></a>
          </div>
          <div class="main">
            <p class="info"><?php echo $value["nickname"]?> 发表于 <?php echo $value["created"]?></p>
            <p class="brief"><?php echo $value["content"]?></p>
            <p class="extra">
              <span class="reading">阅读(<?php echo $value["views"]?>)</span>
              <span class="comment">评论(<?php echo $conmmentsCount?>)</span>
              <a href="javascript:;" postID="<?php echo $value["id"]?>" class="like">
                <i class="fa fa-thumbs-up"></i>
                <span>赞(<?php echo $value["likes"]?>)</span>
              </a>
              <a href="javascript:;" class="tags">
                分类：<span><?php echo $value["name"]?></span>
              </a>
            </p>
            <a href="javascript:;" class="thumb">
              <img src="uploads/hots_2.jpg" alt="">
            </a>
          </div>
        </div>
          <?php endforeach;?>
      </div>
    </div>
    <div class="footer">
      <p>© 2016 XIU主题演示 本站主题由 themebetter 提供</p>
    </div>
  </div>
  <script src="assets/vendors/jquery/jquery.js"></script>
  <script src="assets/vendors/swipe/swipe.js"></script>
  <script>
    //
    var swiper = Swipe(document.querySelector('.swipe'), {
      auto: 3000,
      transitionEnd: function (index) {
        // index++;

        $('.cursor span').eq(index).addClass('active').siblings('.active').removeClass('active');
      }
    });

    // 上/下一张
    $('.swipe .arrow').on('click', function () {
      var _this = $(this);

      if(_this.is('.prev')) {
        swiper.prev();
      } else if(_this.is('.next')) {
        swiper.next();
      }
    })


    //给点赞的a标签添加点击事件
    $(".like").click(function() {
      //获取被点击的那一行的文章id, 将文章id作为自定义属性放进a标签中, 便于获取
      var postId = $(this).attr("postID");
      // console.log(postId);
      //到了post里面, this的指向就发生变化, 所以使用that把this存储起来
      var that = this;
      //发送请求, 获取信息
      $.post({
        url : "admin/api/zan.php",
        data : {id : postId},
        success : function(obj) {
          if(obj != "fail") {
            $(that).html("赞(" + obj + ")");
          } else {
            alert ("点赞失败");
          }
        }
      })
    })



  </script>
</body>
</html>
