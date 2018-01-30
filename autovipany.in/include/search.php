<div class="header-img" style="margin-top: 9px;" align="center"><!-- category brand price min price max -->
<form name="search" method="get" action="">
<table style="width: 990px;">
	<tbody>
		<tr>
			<td><select class="select" id="category" name="categorysearch"
				onchange="populateEverySelectSearch(this.value)"
				style="width: 200px">
				<option value="0">Select Type</option>
				<option value="1">Scooter</option>
				<option value="2">Bike</option>
				<option value="3">Auto Rikshaw</option>
				<option value="4">Car</option>
				<option value="5">Bus/Tempo/Truck</option>
				<option value="6">Other</option>
			</select></td>
			<td id="searchbrand"><select class="select">
				<option>Brand</option>
			</select></td>
			<td><select class="select" id="minpay" name="paymin" style="width: 200px">
				<option value="0">Select Value</option>
				<option value="1">&lt;25,000 </option>
				<option value="2">50,000 </option>
				<option value="3">1 lakh </option>
				<option value="4">2 lakh </option>
				<option value="5">3 lakh </option>
				<option value="6">4 lakh </option>
				<option value="7">5 lakh </option>
				<option value="8">6 lakh </option>
				<option value="9">7 lakh </option>
				<option value="10">8 lakh </option>
				<option value="11">9 lakh </option>
				<option value="12">10 lakh </option>
				<option value="13">15 lakh </option>
				<option value="14">20 lakh </option>
				<option value="15">25 lakh </option>
				<option value="16">30 lakh </option>
				<option value="17">50 lakh </option>
				<option value="18">1 Cr </option>
				<option value="19">Other </option>
			</select></td>
			<td><select class="select" id="maxpay" name="paymax" style="width: 200px">
				<option value="0">Select Value</option>
				<option value="1">&lt;25,000 </option>
				<option value="2">50,000 </option>
				<option value="3">1 lakh </option>
				<option value="4">2 lakh </option>
				<option value="5">3 lakh </option>
				<option value="6">4 lakh </option>
				<option value="7">5 lakh </option>
				<option value="8">6 lakh </option>
				<option value="9">7 lakh </option>
				<option value="10">8 lakh </option>
				<option value="11">9 lakh </option>
				<option value="12">10 lakh </option>
				<option value="13">15 lakh </option>
				<option value="14">20 lakh </option>
				<option value="15">25 lakh </option>
				<option value="16">30 lakh </option>
				<option value="17">50 lakh </option>
				<option value="18">1 Cr </option>
				<option value="19">Other</option>
			</select></td>
			<td><input type="button" onclick="keepSearching(0,1);" class="button" value="Search"></td>
		</tr>
	</tbody>
</table></form>
</div>