<?php
	include('functions.php');
	$log = 'data.json'; // Path to log
	$json = file_get_contents($log); // Load log contents
	$data = json_decode($json, true); // Convert JSON to array
	switch ($_GET['mode']) {
		case 'tally':
						$count = 0;
						foreach ($data as $task){
								$count = $count + ($task['date_end'] - $task['date_start']);
						}
						echo time_nice($count);
		break;
		case 'build':
						foreach ($data as $task){
							 ?>
									<tr>
										<td><?=$task['name'] ?></td>
										<td><?=dateNice($task['date_start']) ?></td>
										<td><?php
														if ($task['date_end']!= "") {
														echo dateNice($task['date_end']);
														}
												?>
										</td>
										<td>
											<?php
												if ($task['date_end'] == "") {
													echo time_nice(time() - $task['date_start']);
												}
												else {
													echo time_nice($task['date_end'] - $task['date_start']);
												}
											?>
										</td>
										<td><button class="btn btn-xs btn-primary"><?=i('stop') ?></button></td>
										<td><button class="btn btn-xs btn-danger"><?=i('times') ?></button></td>
									</tr>
						<?php }
			break;
	}
