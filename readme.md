首先，这是在凌晨2点07分。
这是第一次这么轻松的使用git这个版本控制软件，我真的开心的要哭出来了，哈哈
不得不说这款phpstorm真的是一个神器，它包容一切，却又十分简洁，真是超级喜欢了，哈哈



言归正传，下面开始项目的规划：

虽说不是一个大项目，但毕竟好久没写原生的php了，所以尽可能的规划下吧，就当复习了，哈哈




文件目录

index.php           //用来引入用到的文件
static/             //用于存放静态模板和css,js文件
    css
        bootstrap.css   //cdn
    js
        jquery.js       //cdn
    views
        home.php

data/               //存放要操作的文件，乔让用文件操作
    data.txt

home.php/           //控制器




data 文件

里面存为json
  格式如下：
            {
                'id'        :   '1',
                'parent_id' :   '0',
                'name'      :   '匿名用户',
                'ip'        :   '192.168.58.2',
                'created_at':   '2015-07-24 16:54:23',
                'content'   :   '这里是留言1内容！'
            },
            {
                'id'        :   '2',
                'parent_id' :   '1',
                'name'      :   '匿名用户',
                'ip'        :   '192.168.58.3',
                'created_at':   '2015-07-24 15:54:23',
                'content'   :   '这里是对id=1的留言的回复！'
            }



view页面

