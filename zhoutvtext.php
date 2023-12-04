1. <?php
2. error_reporting(0);
3. $id = isset($_GET['id'])?$_GET['id']:'xjws';
4. $n = [
5. 'xjws' =>  0,//新疆卫视
6. 'xwwy' =>  1,//维语新闻综合
7. 'xwhy' =>  2,//哈语新闻综合
8. 'xjzy' =>  3,//汉语综艺
9. 'yswy' =>  4,//维语影视
10. 'xjjj' =>  5,//汉语**生活
11. 'zyhy' =>  6,//哈语综艺
12. 'jjwy' =>  7,//维语*济生活
13. 'xjty' =>  8,//汉语体育健康
14. 'xjxx' =>  9,//汉语信息服务
15. 'xjse' => 10,//少儿频道
16. ];
17. $url = 'https://www.xjtvs.com.cn/bvradio_app/service/cms?functionName=getChannel&stationID=100&_=1686808782787';
18. $ch = curl_init($url);
19. curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
20. curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
21. curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
22. curl_setopt($ch, CURLOPT_REFERER,'https://www.xjtvs.com.cn/live/xjtv.shtml');
23. $res = curl_exec($ch);  
24. curl_close($ch);
25. //var_dump ($res);
26. $m3u8 = json_decode($res)[$n[$id]]->playUrl;
27. //echo $m3u8;
28. //header('Location:'.$m3u8);
29. //后面这段代码可以删除（频道高峰期会随机不定时打不开，加个判断），去掉//header('Location:'.$m3u8);的//即可使用。
30. $ch = curl_init($m3u8);
31. curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
32. curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
33. curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
34. curl_setopt($ch, CURLOPT_REFERER,'https://www.xjtvs.com.cn/live/xjtv.shtml');
35. $play = curl_exec($ch);  
36. curl_close($ch);
37. if(strpos($play,'.ts') !== false){ 
38. header('Location:'.$m3u8);
39. }else{
40. header('Location:https://mp4.vjshi.com/2020-12-03/8f09e994ee947a7d4b1da80097395a04.mp4');
41. }

