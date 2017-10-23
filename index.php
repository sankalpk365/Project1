<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);


/*class Manage {
  public static function autoload($class) {
          include $class . '.php';
	            }
		          }

			       spl_autoload_register(array('Manage', 'autoload')); */

			               $obj = new main();

				       class main 

				       {

				           public function __construct()
					           {
						           
							           $pageRequest = 'homepage';

								           if(isset($_REQUEST['page'])) 

									           {

										           $pageRequest = $_REQUEST['page'];
											           }
												               
													                   $page =
															   new
															   $pageRequest;
															                   
																	                   if($_SERVER['REQUEST_METHOD']
																			   ==
																			   'GET') 

																			                   {
																					                           $page->get();
																								                   }

																										                   else
																												   {


																												               echo
																													       '-----In
																													       Post';
																													                   $page->post();
																															           }
																																           }
																																	       
																																	          }

																																		  abstract
																																		  class
																																		  page
																																		  {
																																		      protected
																																		      $html;

																																		              public
																																			      function
																																			      __construct()
																																			          {
																																				          $this->html
																																					  .=
																																					  '<html>';
																																					          $this->html
																																						  .=
																																						  '<link
																																						  rel="stylesheet"
																																						  href="styles.css">';
																																						          $this->html
																																							  .=
																																							  '<body>';
																																							          }

																																								          public
																																									  function
																																									  __destruct()
																																									      {
																																									              $this->html
																																										      .=
																																										      '</body></html>';

																																										          }

																																											          public
																																												  function
																																												  get() 
																																												          {
																																													          echo
																																														  "In
																																														  get
																																														  abstract-------";
																																														          $tmpName=$_REQUEST['filename'];

																																															          
																																																          }

																																																	          public
																																																		  function
																																																		  post()
																																																		  {

																																																		              echo
																																																			      "In
																																																			      post
																																																			      abstract
																																																			      class--------";
																																																			              //
																																																				      print_r($_POST);
																																																				          }
																																																					  }


																																																					  class
																																																					  homepage
																																																					  extends
																																																					  page
																																																					  {

																																																					       public
																																																					       function
																																																					       get()
																																																					       {

																																																					               $form
																																																						       =
																																																						       '<form
																																																						       action="index.php"
																																																						       method="post"
																																																						       enctype="multipart/form-data">';
																																																						               $form
																																																							       .=
																																																							       '<input
																																																							       type="file"
																																																							       name="fileToUpload"
																																																							       id="fileToUpload">';
																																																							               $form
																																																								       .=
																																																								       '<input
																																																								       type="submit"
																																																								       value="Upload"
																																																								       name="submit">';
																																																								               $form
																																																									       .=
																																																									       '</form>';
																																																									               $this->html
																																																										       .=
																																																										       '<h1>Upload
																																																										       Form</h1>';
																																																										               $this->html
																																																											       .=
																																																											       $form;
																																																											               print_r($this->html);

																																																												               }


																																																													           public
																																																														   function
																																																														   post
																																																														   ()
																																																														   {


																																																														           echo
																																																															   "In
																																																															   post
																																																															   extends---------";

																																																															                   $target_dir
																																																																	   ="./uploads/";
																																																																	                   $target_file
																																																																			   =
																																																																			   $target_dir
																																																																			   .basename($_FILES["fileToUpload"]["name"]);
																																																																			                   $csvtype
																																																																					   =
																																																																					   pathinfo($target_file,PATHINFO_EXTENSION);
																																																																					                   $g=pathinfo($target_file,PATHINFO_BASENAME);
																																																																							                   move_uploaded_file($_FILES["fileToUpload"]["name"],
																																																																									   $target_file
																																																																									   );
																																																																									                 
																																																																											                /*
																																																																													if(isset($_POST["submit"]))
																																																																													{
																																																																													                $fileName=$_FILES["fileToUpload"]["name"];
																																																																															                move_uploaded_file($_FILES["fileToUpload"]["tmp_name"],
																																																																																	$target_file);*/
header("Location:index.php?page=uploadform&filename=".$g);
																																																																																		        
		}
																																																																																			  

																																																																																			  }

																																																																																			  class
																																																																																			  uploadform
																																																																																			  extends
																																																																																			  page
																																																																																			  {

																																																																																			             public
																																																																																				     function
																																																																																				     get()
																																																																																				                {

																																																																																						                print_r($_FILES);

																																																																																								                  $csvFile=$_REQUEST["filename"];
																																																																																										                    $row
																																																																																												    =
																																																																																												    1;

																																																																																												                    echo
																																																																																														    "file
																																																																																														    --".$csvFile;

																																																																																														    if
																																																																																														    (($handle
																																																																																														    =
																																																																																		    fopen("./uploads/".$csvFile,"r"))
																																																																																														    !==
																																																																																														    FALSE)
																																																																																														    {

																																																																																														    echo
																																																																																														    '<table
																																																																																														    border="1">';

																																																																																														            while
																																																																																															    (($data
																																																																																															    =
																																																																																															    fgetcsv($handle))
																																																																																															    !==
																																																																																															    FALSE)
																																																																																															    {
																																																																																															                    $num
																																																																																																	    =
																																																																																																	    count($data);
																																																																																																	                    if
																																																																																																			    ($row
																																																																																																			    ==
																																																																																																			    1)
																																																																																																			    {
																																																																																																			                    echo
																																																																																																					    '<thead><tr>';
																																																																																																					                    }else{
																																																																																																							                    echo
																																																																																																									    '<tr>';
																																																																																																									                    }
																																																																																																											            for
																																																																																																												    ($c=0;
																																																																																																												    $c
																																																																																																												    <
																																																																																																												    $num;
																																																																																																												    $c++)
																																																																																																												    {
																																																																																																												                    if(!isset($data[$c]))
																																																																																																														    {
																																																																																																														                    $value
																																																																																																																    =
																																																																																																																    "&nbsp;";
																																																																																																																                    }else{
																																																																																																																		                    $value
																																																																																																																				    =
																																																																																																																				    $data[$c];
																																																																																																																				                    }
																																																																																																																						                    if
																																																																																																																								    ($row
																																																																																																																								    ==
																																																																																																																								    1)
																																																																																																																								    {
																																																																																																																								                    echo
																																																																																																																										    '<th>'.$value.'</th>';
																																																																																																																										                    }else{
																																																																																																																												                    echo
																																																																																																																														    '<td>'.$value.'</td>';
																																																																																																																														                    }
																																																																																																																																               }
																																																																																																																																	               if
																																																																																																																																		       ($row
																																																																																																																																		       ==
																																																																																																																																		       1)
																																																																																																																																		       {
																																																																																																																																		                      echo
																																																																																																																																				      '</tr></thead><tbody>';
																																																																																																																																				                     }else{
																																																																																																																																						                        echo
																																																																																																																																									'</tr>';
																																																																																																																																									               }
																																																																																																																																										                      $row++;
																																																																																																																																												                }

																																																																																																																																														        echo
																																																																																																																																															'</tbody></table>';
																																																																																																																																															        fclose($handle);
																																																																																																																																																        }
																																																																																																																																																	        }
																																																																																																																																																		}

																																																																																																																																																		?>
