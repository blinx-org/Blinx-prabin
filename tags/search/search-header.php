<div class="row">
    <div class="container">
        <div class="col-md-1 sr-tagline"></div>
        <div class="col-md-10 sr-tagline">
            <div class="input-group">
                <form id="frmSearch" text-align="center" class="form-inline" action="<?php echo URL_SEARCH ?>" method="GET">
                    <select class="" style="margin: 0;
    display: block;
    padding: 6px 4px;
    border: 1px solid #ccc;
 
    -moz-box-sizing: content-box;
    -webkit-box-sizing:content-box;
    box-sizing:content-box;
    height: 30px;
    line-height: 25px;
    font-size: 12px;
    float: left;"  id="helpType" onchange="onOptionChange();">
                        <option value="None" selected>Help By Meeting Personally</option>
                        <option value="DeSoto">Help Over Internet</option>
                    </select>
                    <input class="" id="my-address" style="margin: 0;
    display: block;
    padding: 6px 4px;
    width:500px;
    border: 1px solid #ccc;
    -moz-box-sizing: content-box;
    -webkit-box-sizing:content-box;
    box-sizing:content-box;
    height: 30px;
    line-height: 15px;
    font-size: 12px;
    float: left;"autocomplete="off" spellcheck="false" placeholder="I'm looking around..." >
                    <button class="btn btn-primary" style="margin: 0;
    display: block;
    -moz-box-sizing: content-box;
    -webkit-box-sizing:content-box;
    box-sizing:content-box;
    width:100px;
    height: 30px;
    line-height: 15px;
    font-size: 12px;
    float: next;" type="submit" value="search"  onClick="doSearch();" >search
                    </button>
                    <input type="hidden" name="long" value="" />
                    <input type="hidden" name="lat" value="" />
                    <input type="hidden" name="action" id="action" value="get_app" />
                </form>
                <span class="input-group-btn">
                    
                </span>
            </div>
        </div>
        <div class="col-sm-1 sr-tagline"></div>
    </div>
</div>
