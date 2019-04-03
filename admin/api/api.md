## 确认用户名密码的接口文档
    type : post
    url : api/doLogin.php
    data : 
        email : 邮箱
        password : 密码

    dataType : JSON

    响应体 : 
        {"code" : 10000, "msg" : "ok"}
        或者
        {"code" : 10001, "msg" : "fail"}

## 判断是否登录的接口
    type:get
    url: api/checkLogin.php
    data:没有
    响应体：
         JSON

        { "code":10000, "msg":"ok" }
        或者
        { "code":10001, "msg":"fail" }

## 获取用户信息数据的接口
    type : get
    url : api/getUserInfo.php
    data : 没有
    响应体: 
        JSON
        {"id": 1, ......}

## 获取网站统计数据的接口
    type : get
    url : "api/getWebInfo.php"
    data : 没有
    响应体 : 
        JSON
        {wenzhang:700  caogao:210  fenlei:4  pinglun:400  daishenhe:83}

## 获取分页评论数据的接口
    type : get
    url : "api/getComments.php"
    data : pageIndex : 页码
           pageSize : 页容量
    响应体: 
        JSON
        {
            [],
            [],
            [],.....
        }

## 修改评论的接口

    type: post
    url : api/editComments.php
    data : 
        status : 告诉我要把状态修改成什么状态
        ids : 告诉我要修改哪些数据
            如果单行, 值就传一个id, 如果是多行, 就传多个id
            ids 的取值要么是"3", 要么是"3, 5, 6, 9"

    响应体: 
        JSON
    {"code" : 10000, "msg" : "ok"}
    或者是
    {"code" : 10001, "msg" : "fail"}

## 获取文章信息的接口
    type: get
    url : api/getPosts.php
    data : 
        pageInex : 当前加载的页码
        pageSize : 一页显示的条数
    响应体 : 
        JSON
        [
            data : 获取到的文章总数
            totalPages : 获取到的总条数
        ]


## 获取分类的接口
    type : get
    data : 没有
    url : api/getCategory.php

    响应体 : 
        JSON
        [
            {},
            {}
        ]


## 删除文章的接口
    type : post
    url : api/deletePosts.php
    data : ids : 传递过来的要删除的id

    响应体: 
        JSON
        {"code" : 10000, "msg" : "ok"}
        或者是
        {"code" : 10001, "msg" : "fail"}

## 新增文章的接口
    type : post
    url : api/addPosts.php,
    data : {
        title : 文章标题
        content : 文章内容
        slug : 文章别名
        feature : 特色图片
        created : 发布时间
        category : 分类
        status : 文章状态
    }

    响应体 : 
        JSON
        {"code" : 10000, "msg" : "ok"}
        或者是
        {"code" : 10001, "msg" : "fail"}

## 根据id获取文章信息的接口
    type : get
    data : id : 需要查询的那篇文章的id
    url : "api/getPostById.php"
    响应体 : 
        JSON
        {title, slug....}

## 修改用户信息的接口
    url : "api/editUser.php
    type : post
    data : 
        avatar : 用户头像
        email : 用户邮箱
        slug : 用户别名
        nickname : 用户昵称
        bio : 用户简介
    响应体: 
        JSON
        {"code" : 10000, "msg" : "ok"}
        或者是
        {"code" : 10001, "msg" : "fail"}

## 修改密码的请求
    type : post
    url : "api/changePassword.php"
    data : 
        oldPass : 旧密码
        newPass : 新密码
    响应体:
        JSON
        {"code" : 10000, "msg" : "ok"}
        或者是
        {"code" : 10001, "msg" : "fail"}

## 添加分类的接口
    type : post
    url : api/addCategory.php
    data : 
        slug : 别名
        name : 分类名
    响应体; 
        JSON
        {"code" : 10000, "msg" : "ok"}
        或者是
        {"code" : 10001, "msg" : "fail"}

## 编辑分类的接口
    type: post
    data : 
        name:
        slug
    url : api/editCategory.php
    响应体: 
        JSON
        {"code" : 10000, "msg" : "ok"}
        或者是
        {"code" : 10001, "msg" : "fail"}

## 删除分类的接口
type:post
url:api/deleteCategory.php
data:
    ids:要删除的id
响应体：
    JSON
    { "code":10000, "msg":"ok" }
    或者
    { "code":10001, "msg":"fail" }


## 获取所有轮播图的接口
type:get
url:api/getSliders.php
data:无
响应体：
    JSON
    [
        {},
        {}
    ]


## 新增轮播图的接口
type:post
url:api/addSlider.php
data:
    image:图片
    text:文本
    link:连接
响应体：
    JSON
    { "code":10000, "msg":"ok" }
    或者
    { "code":10001, "msg":"fail" }

## 删除轮播的接口
    type:post
    url:api/deleteSlider.php
    data:
        ids:要删除的id
    响应体：
        JSON
        { "code":10000, "msg":"ok" }
        或者
        { "code":10001, "msg":"fail" }

## 获取用户的接口
type:get
url:api/getUsers.php
data:无
响应体：
    JSON
    [
        {},
        {}
    ]