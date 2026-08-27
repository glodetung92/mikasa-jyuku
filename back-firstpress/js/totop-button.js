// ＴＯ－ＴＯＰのグローバル変数
var syncerTimeout = null ;
// 一連の処理
j$( function()
{
	// スクロールイベントの設定
	j$( window ).scroll( function()
	{
		// 1秒ごとに処理
		if( syncerTimeout == null )
		{
			// セットタイムアウトを設定
			syncerTimeout = setTimeout( function(){

				// 対象のエレメント
				var element = j$( '#page-top' ) ;

				// 現在、表示されているか？
				var visible = element.is( ':visible' ) ;

				// 最上部から現在位置までの距離を取得して、変数[now]に格納
				var now = j$( window ).scrollTop() ;

				// 最下部から現在位置までの距離を計算して、変数[under]に格納
				var under = j$( 'body' ).height() - ( now + j$(window).height() ) ;

				// 最上部から現在位置までの距離(now)が120以上かつ
				// 最下部から現在位置までの距離(under)が10px以上かつ…
				// if( now > 120 && 10 < under )
				if( now > 120 )
				{
					// 非表示状態だったら
					if( !visible )
					{
						// [#page-top]をゆっくりフェードインする
						element.fadeIn( 'slow' ) ;
					}
				}
				// 100px以下かつ
				// 表示状態だったら
				else if( visible )
				{
					// [#page-top]をゆっくりフェードアウトする
					element.fadeOut( 'slow' ) ;
				}

				// フラグを削除
				syncerTimeout = null ;
			} , 1000 ) ;
		}
	} ) ;

	// クリックイベントを設定する
	j$( '#move-page-top' ).click(
		function()
		{
			// スムーズにスクロールする
			j$( 'html,body' ).animate( {scrollTop:0} , 'slow' ) ;
		}
	) ;
} ) (jQuery);
