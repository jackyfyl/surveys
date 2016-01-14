#建行抽奖调查API 1.1

##新建调查表

http://xxx.xxx.xxx.xxx/surveys/addwithbingo.json

###POST数据
	data[Survey][userid] = "400客服热线满意度问卷_1"
	data[Survey][q01] = "13813800012"
	data[Survey][q48] = 1 		1 - 完成调查， 0 - 尚未完成

###返回：
	{
	    "id": "1939", // 新建记录的ID
	    "bingo": 1, // 中奖与否，如果没有中奖，此字段不返回
	    "order": 3, // 该提交在总提交中的顺序，如果没有中奖，此字段不返回
	    "finished": "1", // 是否完成调查，原数据返回
	    "q01": "12345678901", // 原数据返回
	    "userid": "400\u5ba2\u670d\u70ed\u7ebf\u6ee1\u610f\u5ea6\u95ee\u5377_1" // 原数据返回
	}


##编辑调查表

http://xxx.xxx.xxx.xxx/surveys/editwithbingo/{id}.json

    其中id是addwithbingo接口返回的ID

###POST数据
	data[Survey][id] = "1939" // addwithbingo接口返回的ID
	data[Survey][userid] = "400客服热线满意度问卷_1"
	data[Survey][q01] = "13813800012"
	data[Survey][q48] = 1 		1 - 完成调查， 0 - 尚未完成

###返回：
	{
	    "id": "1939", // 原数据返回
	    "bingo": 1, // 中奖与否，如果没有中奖，此字段不返回
	    "order": 3, // 该提交在总提交中的顺序，如果没有中奖，此字段不返回
	    "finished": "1", // 是否完成调查，原数据返回
	    "q01": "12345678901", // 原数据返回
	    "userid": "400\u5ba2\u670d\u70ed\u7ebf\u6ee1\u610f\u5ea6\u95ee\u5377_1" // 原数据返回
	}


###如果有错误，上述API返回的json中会有{"error" : "错误信息"}，或者报404错。

###代码
	https://github.com/jackyfyl/surveys/tree/guanshan
	branch: guanshan