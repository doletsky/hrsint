  <div class="h-lang">
    <?
    $langArr=array(
      '/eng/' => 'Eng',
      '/rus/' => 'Рус'
    );
    if(1 || CSite::inDir("/cze/")){
      $langArr=array(
		'/bgr/' => 'Bgr',
		'/cze/' => 'Čes',
        '/eng/' => 'Eng',
		'/hun/' => 'Hun',
        '/hrv/' => 'Hrv',
        '/rus/' => 'Рус',
       
      
      );
    }
	

	?>
	  <ul class="h-lang__list new langs-popup-list-activator">
      <?foreach($langArr as $langURL => $langName){?>
        <?if(CSite::inDir($langURL)){?>
            <li class="h-lang__item"><span class="h-lang__l_active h-lang__l"><?=$langName?></span></li>
        <?}?>
         
      <?}?>
    </ul>	
	<div class="mn-nested-wrap langs-popup-list">
		<ul class="mn-nested">
		<?foreach($langArr as $langURL => $langName){?>
			<?if(!CSite::inDir($langURL)){?>
			  <li class="h-lang__item"><a class="h-lang__l" href="<?=$langURL?>"><?=$langName?></a></li>
			<?}?>
			  
		  <?}?>
		</ul>	

	</div>
		</div>
	 <?/*?>
    <ul class="h-lang__list new">
      <?foreach($langArr as $langURL => $langName){?>
        <?if(!CSite::inDir($langURL)){?>
          <li class="h-lang__item"><a class="h-lang__l" href="<?=$langURL?>"><?=$langName?></a></li>
        <?}else{?>
          <li class="h-lang__item"><span class="h-lang__l_active h-lang__l"><?=$langName?></span></li>
        <?}?>
      <?}?>
    </ul>
  </div>
  <?/*?>
  <div class="h-lang">
    <a href=""><i></i><?if("en"==LANGUAGE_ID){?>ENG<?}else{?>РУС<?}?></a>
    <div class="language-box">
      <b><i></i></b>
      <?if("en"==LANGUAGE_ID){?>
      <ul>
        <li><span><i></i>ENG</span></li>
        <li><a href="/">РУС</a></li>
      </ul>
      <?}else{?>
      <ul>
        <li><a href="/eng/">ENG</a></li>
        <li><span><i></i>РУС</span></li>
      </ul>
      <?}?>
    </div>
  </div>
  <?*/?>

</div>