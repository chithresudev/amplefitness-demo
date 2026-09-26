                    <?php
                    $sidebarServices = [
                        'personal-training'     => 'Personal training',
                        'muscle-building'       => 'Muscle Building',
                        'nutrition-coaching'    => 'Nutrition Coaching',
                        'group-fitness'         => 'Group Fitness',
                        'strength-conditioning' => 'Strength & Conditioning',
                        'cardio-sessions'       => 'Cardio Sessions',
                        'fitness-boot-camps'    => 'Fitness Boot Camps',
                    ];
                    ?>
                    <!-- Page Category List Start -->
                    <div class="page-catagery-list wow fadeInUp">
                        <h3>Our Services</h3>
                        <ul>
                            <?php foreach ($sidebarServices as $slug => $label): ?>
                            <li class="<?php echo $request == '/services/' . $slug ? 'active' : '' ?>"><a href="<?php echo $currentUrl . '/services/' . $slug ?>"><?php echo $label ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <!-- Page Category List End -->