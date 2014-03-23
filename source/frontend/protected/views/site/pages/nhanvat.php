<?php $this->pageTitle = Yii::app()->name . ' - Nhân vật'; ?>
<div class="boxTop clearfix">
	<h2><a href="#" class="title-nhanvat">Nhân vật</a></h2>
	<ul class="breadcrumb clearfix">
		<li><a href="#">Trang chủ</a>&gt;</li>
		<li><a href="#">Giới thiệu</a>&gt;</li>
		<li><span>Nhân vật</span></li>
	</ul>
</div>
<div class="boxBottom">
	<div class="container">
		<div class="nhanvat">
			<div class="text_nhanvat">Nhân vật</div>
			<ul class="tab clearfix">
				<li><a href="javascript:void(0)" class="active" rel="tu-la">Tu La</a></li>
				<li><a href="javascript:void(0)" rel="long-cung">Long Cung</a></li>
				<li><a href="javascript:void(0)" rel="da-xoa">Dạ Xoa</a></li>
			</ul>
			<p>Có 3 lớp nhân vật tượng trưng cho Tam Tộc trong Tề Thiên:</p>
			<div id="tu-la" class="ctTab" style="display:block">
				<div class="text">
					<h2>Tu la</h2>
					<p>Là  tộc chiến đấu cận chiến. Sức khỏe mạnh mẽ, khoác lên mình kiếm to giáp nặng, có thể tự do hoạt động, máu nhiều, phòng ngự cao, gây thù hận thu hút BOSS, có kỹ năng khống chế, năng lực sinh tồn cao.</p>
				</div>
			</div>
			<div id="long-cung" class="ctTab" style="display:none">
				<div class="text">
					<h2>Long cung</h2>
					<p>Là tộc chiến đấu ở tầm xa. Tinh thần mạnh mẽ là tôn chỉ tu luyện, có thể thi triển hiệu quả tấn công bất ngờ, đồng thời không quên trị liệu cho đồng đội. Kỹ năng bảo vệ và thêm máu hữu hiệu phong phú, năng lực bổ trợ mạnh.</p>
				</div>
			</div>
			<div id="da-xoa" class="ctTab" style="display:none">
				<div class="text">
					<h2>Dạ xoa</h2>
					<p>Trong chiến đấu dũng cảm tiến lên phía trước không hề lùi bước, luôn luôn là chủ lực tấn công gần mạnh nhất, tốc độ chiến đấu nhanh, khả năng phòng ngự cao.</p>
				</div>
			</div>
		</div>				
	</div>
</div>