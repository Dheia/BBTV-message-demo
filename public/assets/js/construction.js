$((function(s){var a=new Date;a.setDate(a.getDate()+2),$("#countdown").countdown(a,(function(s){$(this).html(s.strftime('<div class="timer-wrapper"><div class="time">%D</div><span class="text">days</span></div><div class="timer-wrapper"><div class="time">%H</div><span class="text">hrs</span></div><div class="timer-wrapper"><div class="time">%M</div><span class="text">mins</span></div><div class="timer-wrapper"><div class="time">%S</div><span class="text">sec</span></div>'))}))}));