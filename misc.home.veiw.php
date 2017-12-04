					<?php 
						die('not to be viewd');
						?>
					<ul class="message-list">
						<li class="unread">
							<div class="col col-1"><span class="dot"></span>
								<div class="checkbox-wrapper">
									<input type="checkbox" id="chk1">
									<label for="chk1" class="toggle"></label>
								</div>
								<p class="title">Lucas Kriebel (via Twitter)</p><span class="star-toggle glyphicon glyphicon-star-empty"></span>
							</div>
							<div class="col col-2">
								<div class="subject">Lucas Kriebel (@LucasKriebel) has sent you a direct message on Twitter! &nbsp;&ndash;&nbsp; <span class="teaser">@LucasKriebel - Very cool :) Nicklas, You have a new direct message.</span></div>
								<div class="date">11:49 am</div>
							</div>
						</li>
						<li class="green-dot unread">
							<div class="col col-1"><span class="dot"></span>
								<div class="checkbox-wrapper">
									<input type="checkbox" id="chk2">
									<label for="chk2" class="toggle"></label>
								</div>
								<p class="title">Conceptboard</p>
								<div class="star-star-toggle glyphicon glyphicon-star-empty"></div>
							</div>
							<div class="col col-2">
								<div class="subject">Please complete your Conceptboard signup &nbsp;&ndash;&nbsp; <span class="teaser">You recently created a Conceptboard account.</span></div>
								<div class="date">11:45 am</div>
							</div>
						</li>
						<li>
							<div class="col col-1"><span class="dot"></span>
								<div class="checkbox-wrapper">
									<input type="checkbox" id="chk20">
									<label for="chk20" class="toggle"></label>
								</div>
								<p class="title">me, Susanna (7)</p><span class="star-toggle glyphicon glyphicon-star-empty"></span>
							</div>
							<div class="col col-2">
								<div class="subject">Since you asked... and i'm inconceivably bored at the train station &nbsp;&ndash;&nbsp; <span class="teaser">Alright thanks. I'll have to re-book that somehow, i'll get back to you.</span></div>
								<div class="date">Mar. 6</div>
							</div>
						</li>
						
						<?php
							//test data - to be removed later
					        $data->message='true';
					        $msg = array('senderid'=>'XCX-17','msgid'=>'1234','fname'=>'Milton','lname'=>'Edwards','username'=>'ACCESS','subject'=>'Test','date'=>'Today','seen'=>0,'body'=>'Hello World');
					        array_push($data->data, $msg);
					        $msg = array('senderid'=>'XCX-17','msgid'=>'456','fname'=>'Milton','lname'=>'Edwards','username'=>'ACCESS','subject'=>'Test','date'=>'Today','seen'=>1,'body'=>'Hello World');
					        array_push($data->data, $msg);
					        // echo 'Sorry. No messages.';
					     ?>