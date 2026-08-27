$.ajax({
	url: 'https://mikasajyuku.jp/blog/feed/',
	type: 'get',
	dataType: 'xml',
	timeout: 5000,
	success: function(xml, status) {
		if (status === 'success') {
			var row = 0;
			var data = [];
			var nodeName;
			$(xml).find('item').each(function() {
				data[row] = {};
				$(this).children().each(function() {
				    nodeName = $(this)[0].nodeName;
				    data[row][nodeName] = {};
				    attributes = $(this)[0].attributes;
				    for (var i in attributes) {
						data[row][nodeName][attributes[i].name] = attributes[i].value;
				    }
					data[row][nodeName]['text'] = $(this).text();
				});
				row++;
			});
			$('#feed').wrapInner('<ul></ul>');
			for (i in data) {
                var update = data[i].pubDate.text;
                var date = new Date(update);
                var update = dateFormat(date);
				
			    $('#feed').find('ul').append('<li><p class="wp"><a href="' + data[i].link.text + '" target="_blank" class="wp">' + data[i].title.text + '</a></p><a href="' + data[i].link.text + '" target="_blank">' + data[i].description.text + '</a><p class="day">' + update + '</p></li>');
			}
		}
	}  
});

                function dateFormat(date) {
                var y = date.getFullYear();
                var m = date.getMonth() + 1;
                var d = date.getDate();
                var w = date.getDay();

                m = ('0' + m).slice(-2);
                d = ('0' + d).slice(-2);

                return y + '年' + m + '月' + d + '日';
}