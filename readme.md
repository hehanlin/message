首先，这是在凌晨2点07分。
2	这是第一次这么轻松的使用git这个版本控制软件，我真的开心的要哭出来了，哈哈
3	不得不说这款phpstorm真的是一个神器，它包容一切，却又十分简洁，真是超级喜欢了，哈哈
4	
5	
6	
7	言归正传，下面开始项目的规划：
8	
9	虽说不是一个大项目，但毕竟好久没写原生的php了，所以尽可能的规划下吧，就当复习了，哈哈
10	
11	
12	
13	
14	文件目录
15	
16	index.php           //用来引入用到的文件
17	static/             //用于存放静态模板和css,js文件
18	    css
19	        bootstrap.css   //cdn
20	    js
21	        jquery.js       //cdn
22	    views
23	        home.php
24	
25	data/               //存放要操作的文件，乔让用文件操作
26	    data.txt
27	
28	home.php/           //控制器
29	
30	
31	
32	
33	data 文件
34	
35	里面存为json
36	  格式如下：
37	            {
38	                'id'        :   '1',
39	                'parent_id' :   '0',
40	                'name'      :   '匿名用户',
41	                'ip'        :   '192.168.58.2',
42	                'created_at':   '2015-07-24 16:54:23',
43	                'content'   :   '这里是留言1内容！'
44	            },
45	            {
46	                'id'        :   '2',
47	                'parent_id' :   '1',
48	                'name'      :   '匿名用户',
49	                'ip'        :   '192.168.58.3',
50	                'created_at':   '2015-07-24 15:54:23',
51	                'content'   :   '这里是对id=1的留言的回复！'
52	            }
53	
54	
55	
56	view页面