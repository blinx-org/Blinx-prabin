<div class="row">
    <div class="container">
        <div class="col-sm-12 sr-tagline">
            <div class="input-group">
                <form id="frmSearch" class="form-inline" action="<?php echo URL_SEARCH ?>" method="GET">
                    <select class="" style="margin: 0;
    display: block;
    padding: 6px 4px;
    border: 1px solid #ccc;
    width: 20%;
    -moz-box-sizing: content-box;
    -webkit-box-sizing:content-box;
    box-sizing:content-box;
    height: 30px;
    line-height: 25px;
    font-size: 12px;
    float: left;"  id="helpType" onchange="onOptionChange();">
                        <option value="None" selected>HelpByMeetingPersonally</option>
                        <option value="DeSoto">HelpOverInternet</option>
                    </select>
                    <input class="" id="my-address" style="margin: 0;
    display: block;
    padding: 6px 4px;
    border: 1px solid #ccc;
    width: 70%;
    -moz-box-sizing: content-box;
    -webkit-box-sizing:content-box;
    box-sizing:content-box;
    height: 30px;
    line-height: 15px;
    font-size: 12px;
    float: left;"autocomplete="off" spellcheck="false" placeholder="I'm looking around..." >
                    <input type="hidden" name="long" value="" />
                    <input type="hidden" name="lat" value="" />
                    <input type="hidden" name="action" id="action" value="get_app" />
                </form>
                <span class="input-group-btn">
                    <button class="btn btn-primary" type="submit" value="search" onClick="doSearch();" >
                        <b>
                            <span class="offshowtext">search</span>
                        </b>
                    </button>
                </span>
            </div>
        </div>
    </div>
</div>
