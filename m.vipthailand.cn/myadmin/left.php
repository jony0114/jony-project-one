<script language="javascript" src="js/easing.js"></script>
<script>
//�ȴ�domԪ�ؼ������.
$(function(){
	$(".treebox .level1 .a1").click(function(){
		$(this).addClass('current')   //����ǰԪ�����"current"��ʽ
		.find('i').addClass('down')   //С��ͷ������ʽ
		.parent().next().slideDown('slow','easeOutQuad')  //��һ��Ԫ����ʾ
		.parent().siblings().children('a').removeClass('current')//��Ԫ�ص��ֵ�Ԫ�ص���Ԫ��ȥ��"current"��ʽ
		.find('i').removeClass('down').parent().next().slideUp('slow','easeOutQuad');//����
		 return false; //��ֹĬ��ʱ��
	});
})
</script>
