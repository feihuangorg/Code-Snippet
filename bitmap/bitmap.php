<?php

/**
 * @auther: dingzhihao
 * @update: 2015-11-06
 *
 * bit-map structure
 *
 */


class md_bitmap {

	public static function instance() {
		return array();
	}

	// set $i in bit-map $b
	public static function set_elmt(& $b, $i) {
		$b[$i>>self::SHIFT] |=  (1<<($i & self::MASK));
	}

	// clear $i in bit-map $b
	public static function clr_elmt(& $b, $i) {
		$b[$i>>self::SHIFT] &= ~(1<<($i & self::MASK));
	}

	// check if $i is set in bit-map $b
	public static function if_set_elmt(& $b, $i) {
		return $b[$i>>self::SHIFT] & (1<<($i & self::MASK));
	}

	// show the bit-map $b
	public static function show(& $b, $sort=false) {
		echo '<hr><p>here goes the bitmap:</p><table>';
		if ($sort) {
			ksort($b, SORT_NUMERIC);
		}
		foreach ($b as $k => $v) {
			echo '<tr><td>', $k, '</td><td>=</td><td>', decbin($v), "</td></tr>";
		}
		echo '</table><hr>';
	}

	// 
	// const BITSPERWORD = 32;
	const MASK = 0x1f;	// 31
	const SHIFT = 5;

}

