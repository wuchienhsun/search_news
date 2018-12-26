<h2><?php echo $title; ?></h2>

<?php echo validation_errors(); ?>

<?php echo form_open('posts/search'); ?>
      <div class="container">
        <div class="text-center">
          <div class="input-group input-group-lg">
              <input name="search" type="text" class="form-control" style="margin-bottom: 3%" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-lg" placeholder="搜尋你想查的東西" value="">
          </div>
            <div class="input-group mb-3" class="option-button" >

              <select name="select" class="custom-select" id="inputGroupSelect02">
                  <option value="0" selected="selected">請選擇搜尋條件...</option>
                  <option name="selected" value="1">標題</option>
                  <option name="selected" value="2">內容</option>
                  <!--<option name="selected" value="3">時間</option>-->
                  <option name="selected" value="4">總類</option>
                  <option name="selected" value="5">國家</option>

              </select>

            </div>
            <button type="submit" method="get" style="height:60px; margin-top: 3%" class="btn btn-success btn-lg btn-block">Search Now!</button>
          </div>
        </div>
      </form>
