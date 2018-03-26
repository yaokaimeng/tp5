jQuery.fn.kadpage = function(maxentries, opts){
	opts = jQuery.extend({
		page_size:10,
		page_display_num:6,
		page_index:0,
		num_begin_end:1,
		link_to:"#",
		prev_text:"上一页",
		next_text:"下一页",
		ellipse_text:"...",
		prev_show_always:true,
		next_show_always:true,
		callback:function(){return false;}
	},opts||{});
	
	return this.each(function() {
		/**
		 * 计算最大分页显示数目
		 */
		function numPages() {
			return Math.ceil(maxentries/opts.page_size);
		}	
		/**
		 * 极端分页的起始和结束点，这取决于page_index 和 page_display_num.
		 * @返回 {数组(Array)}
		 */
		function getInterval()  {
			var ne_half = Math.ceil(opts.page_display_num/2);
			var np = numPages();
			var upper_limit = np-opts.page_display_num;
			var start = page_index>ne_half?Math.max(Math.min(page_index-ne_half, upper_limit), 0):0;
			var end = page_index>ne_half?Math.min(page_index+ne_half, np):Math.min(opts.page_display_num, np);
			return [start,end];
		}
		
		/**
		 * 分页链接事件处理函数
		 * @参数 {int} page_id 为新页码
		 */
		function pageSelected(page_id, evt){
			page_index = page_id;
			drawLinks();
			var continuePropagation = opts.callback(page_id, panel);
			if (!continuePropagation) {
				if (evt.stopPropagation) {
					evt.stopPropagation();
				}
				else {
					evt.cancelBubble = true;
				}
			}
			return continuePropagation;
		}
		
		/**
		 * 此函数将分页链接插入到容器元素中
		 */
		function drawLinks() {
			panel.empty();
			var interval = getInterval();
			var np = numPages();
			// 这个辅助函数返回一个处理函数调用有着正确page_id的pageSelected。
			var getClickHandler = function(page_id) {
				return function(evt){ return pageSelected(page_id,evt); }
			}
			//辅助函数用来产生一个单链接(如果不是当前页则产生span标签)
			var appendItem = function(page_id, appendopts){
				page_id = page_id<0?0:(page_id<np?page_id:np-1); // 规范page id值
				appendopts = jQuery.extend({text:page_id+1, classes:""}, appendopts||{});
				if(page_id == page_index){
					var lnk = jQuery("<span class='current'>"+(appendopts.text)+"</span>");
				}else{
					var lnk = jQuery("<a>"+(appendopts.text)+"</a>")
						.bind("click", getClickHandler(page_id))
						.attr('href', opts.link_to.replace(/__id__/,page_id));		
				}
				if(appendopts.classes){lnk.addClass(appendopts.classes);}
				panel.append(lnk);
			}
			// 产生"Previous"-链接
			if(opts.prev_text && (page_index > 0 || opts.prev_show_always)){
				appendItem(page_index-1,{text:opts.prev_text, classes:"prev"});
			}
			// 产生起始点
			if (interval[0] > 0 && opts.num_begin_end > 0)
			{
				var end = Math.min(opts.num_begin_end, interval[0]);
				for(var i=0; i<end; i++) {
					appendItem(i);
				}
				if(opts.num_begin_end < interval[0] && opts.ellipse_text)
				{
					jQuery("<span>"+opts.ellipse_text+"</span>").appendTo(panel);
				}
			}
			// 产生内部的些链接
			for(var i=interval[0]; i<interval[1]; i++) {
				appendItem(i);
			}
			// 产生结束点
			if (interval[1] < np && opts.num_begin_end > 0)
			{
				if(np-opts.num_begin_end > interval[1]&& opts.ellipse_text)
				{
					jQuery("<span>"+opts.ellipse_text+"</span>").appendTo(panel);
				}
				var begin = Math.max(np-opts.num_begin_end, interval[1]);
				for(var i=begin; i<np; i++) {
					appendItem(i);
				}
				
			}
			// 产生 "Next"-链接
			if(opts.next_text && (page_index < np-1 || opts.next_show_always)){
				appendItem(page_index+1,{text:opts.next_text, classes:"next"});
			}
		}
		
		//从选项中提取page_index
		var page_index = opts.page_index;
		//创建一个显示条数和每页显示条数值
		maxentries = (!maxentries || maxentries < 0)?1:maxentries;
		opts.page_size = (!opts.page_size || opts.page_size < 0)?1:opts.page_size;
		//存储DOM元素，以方便从所有的内部结构中获取
		var panel = jQuery(this);
		// 获得附加功能的元素
		this.selectPage = function(page_id){ pageSelected(page_id);}
		this.prevPage = function(){ 
			if (page_index > 0) {
				pageSelected(page_index - 1);
				return true;
			}
			else {
				return false;
			}
		}
		this.nextPage = function(){ 
			if(page_index < numPages()-1) {
				pageSelected(page_index+1);
				return true;
			}
			else {
				return false;
			}
		}
		// 所有初始化完成，绘制链接
		drawLinks();
        // 回调函数
        opts.callback(page_index, this);
	});
}


