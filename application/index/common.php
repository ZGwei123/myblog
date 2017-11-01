<?php
	// 除去二维数组中重复键值的元素  保留一个元素
	function arr_unique($arr2d){
		// 遍历二维数组中的第一维 将第二维数组转成字符串
		foreach($arr2d as $key => $value){
			// 遍历第二维数组  将数组键名保存到字符串中
			foreach($value as $key2 => $value2){
				$str[] = $key2."#:#".$value2;  // 将键名和键值用“#:#”连接成字符串
			}
			$arr[$key] = implode("#,#",$str);     // 将数组转成字符串  将$str数组中的键值用“#,#”连接成字符串
			$str = array();   //  清空数组，避免数组内容叠加
 		}
		$arr = array_unique($arr);  // 清除重复键值的元素
		// 遍历数组  将字符串转成数组
		foreach($arr as $key => $value){
			$arr2d2[$key] = explode("#,#",$value);   // 将字符串转成数组
			// 遍历数组 将$arr2d数组遍历赋值到$arr2d3数组，以恢复第二维数组中原键名
			foreach($arr2d2[$key] as $key2 => $value2){
				$arra = explode("#:#",$value2);   // 将字符串转成数组   拆分出键名和键值
				$arr2d3[$key][$arra[0]] = $arra[1];  // 赋值
			}
		}
		return $arr2d3;
	}
?>