/* perform JavaScript after the document is scriptable. */
   $(function() {
  /* setup ul.tabs to work as tabs for each div directly under div.panes  */
    $("ul.tabs").tabs("div.panes > div");
  });


  function page(selId){

        $(document).ready(function(){
    /*  Install a fresh copy of Wordpress*/
        if(selId == 'inst'){
        $('#i').html('<img src="images/arrows16.gif"/>');        
			  
				$.get('index_inst.php', {}, function(result, status){				
						if(status == 'success'){
								$("#content_2").html(result);
								    $("#i").html('');                								
						}
				});
    /*  Develop the websites */
        }else if(selId == 'dev'){
        $('#d').html('<img src="images/arrows16.gif"/>');        
			  
				$.get('index_dev.php', {}, function(result, status){				
						if(status == 'success'){
								$("#content_2").html(result);
								    $("#d").html('');                								
						}
				});
    /*  Website back-ups  */
        }else if(selId == 'bac'){
        $('#b').html('<img src="images/arrows16.gif"/>');        
			  
				$.get('index_bac.php', {}, function(result, status){				
						if(status == 'success'){
								$("#content_2").html(result);
								    $("#b").html('');                								
						}
				});
    /*  Back-up this code  */                
        }else if(selId == 'admin_bac'){
        $('#a_b').html('<img src="images/arrows16.gif"/>');        
			  
				$.get('index_admin_bac.php', {}, function(result, status){				
						if(status == 'success'){
								$("#content_3").html(result);
								    $("#a_b").html('');                								
						}
				});        
    /*  Package the site  */                
        }else if(selId == 'pac'){
        $('#p').html('<img src="images/arrows16.gif"/>');        
			  
				$.get('index_pac.php', {}, function(result, status){				
						if(status == 'success'){
								$("#content_2").html(result);
								    $("#p").html('');                								
						}
				});        
    /*  Remove a the site  */                
        }else if(selId == 'rem'){
        $('#r').html('<img src="images/arrows16.gif"/>');        
			  
				$.get('index_rem.php', {}, function(result, status){				
						if(status == 'success'){
								$("#content_2").html(result);
								    $("#r").html('');                								
						}
				}); 
    /*  Admin settings for localhost on computer  */               
        }else if(selId == 'admin_set'){
        $('#a_s').html('<img src="images/arrows16.gif"/>');        
			  
				$.post('admin_one.php', {}, function(result, status){				
						if(status == 'success'){
								$("#content_3").html(result);  
								$("#a_s").html('');                  
            }
				});				
    /*  Admin reset settings for localhost on computer  */               
        }else if(selId == 'admin_res'){
        $('#a_r').html('<img src="images/arrows16.gif"/>');        
			  
				$.post('index_admin_res.php', {}, function(result, status){				
						if(status == 'success'){
								$("#content_3").html(result);  
								$("#a_r").html('');                  
            }
				});				
    /*  Admin display settings for localhost on computer  */               
        }else if(selId == 'admin_dis'){
        $('#a_d').html('<img src="images/arrows16.gif"/>');        
			  
				$.post('index_admin_dis.php', {}, function(result, status){				
						if(status == 'success'){
								$("#content_3").html(result);  
								$("#a_d").html('');                  
            }
				});
    /*  Download the latest git installation file  */        				
        }else if(selId == 'git_down'){
        $('#g_d').html('<img src="images/arrows16.gif"/>');        

				$.post('git_down.php', {}, function(result, status){				
						if(status == 'success'){
								$("#content_6").html(result);  
								$("#g_d").html('');                  
            }
				});				
      }                                                                                              
    });									  		
	}


/*  Installs a new version of Wordpress*/
    function inst_one(){
  
		var web = document.getElementById("web").value; 
       
       if(web != ""){        
          $(document).ready(function(){

          $('#i').html('<img src="images/arrows16.gif"/>');        
			  
				  $.post('inst_one.php', {web:web}, function(result, status){          				
						  if(status == 'success'){
								  $("#content_2").html(result);  
								  $("#i").html('');                  
              }
				  });				
		    });
      }else{
      
        alert("Make sure all fields are filled");
      									  		
	    }
    }
/*  Confirm Installation of a new install of Wordpress  */
    function inst_confirm(){                            
               
          $(document).ready(function(){
 
          $('#i').html('<img src="images/arrows16.gif"/>');        
			  
				  $.post('inst_two.php',  function(result, status){                                        				
                  
              if(status == 'success'){
              		$("#content_2").html(result);  
								  //$("#i").html('');                  						
              }
				  });				
		    });
  }


/*  Launches the download and opens the new window to continue installation  */
    function inst_cont(web, lh_port){                            
               
          $(document).ready(function(){
 
          $('#i').html('<img src="images/arrows16.gif"/>');        
			  
				  $.post('inst_three.php', {web:web}, function(result, status){                                        				

              if(status == 'success'){                  						
						      var line = "http://" + lh_port + "/wordpress_" + web + "/wp-admin/install.php";
						      newWin = open(line);						
								  $("#i").html('');                            
              }
				  });				
		    });
  }  


/*  Cancel screen for the name of the website you are trying to use */ 
    function inst_deny(){
              
          $(document).ready(function(){

          $('#i').html('<img src="images/arrows16.gif"/>');        
			  
				  $.post('inst_one.php', {}, function(result, status){				
						  if(status == 'success'){
								  $("#content_2").html('');  
								  $("#i").html('');                  
              }
				  });				
		    });
    }


/*  Cancel the screen for the name of the website you are trying to use */ 
    function rem_deny(){
             
 
          $(document).ready(function(){

          $('#r').html('<img src="images/arrows16.gif"/>');        
			  
				  $.post('index_rem.php', {}, function(result, status){				
						  if(status == 'success'){
								  $("#content_2").html('');  
								  $("#r").html('');                  
              }
				  });				
		    });
    }


/*  Start checking to see if you can delete this website */ 
    function rem_one(web){
             
 
          $(document).ready(function(){

          $('#r').html('<img src="images/arrows16.gif"/>');        
			  
				  $.post('rem_one.php', {web:web}, function(result, status){				
						  if(status == 'success'){
								  $("#content_2").html(result);  
								  $("#r").html('');                  
              }
				  });				
		    });
    }


/*  Confirm you want to delete this website */ 
    function rem_confirm(web){
             
          $(document).ready(function(){

          $('#r').html('<img src="images/arrows16.gif"/>');        
			  
				  $.post('rem_two.php', {web:web}, function(result, status){				
						  if(status == 'success'){
								  $("#content_2").html(result);  
								  $("#r").html('');                  
              }
				  });				
		    });
    }

/*  Pass database settings to the table */ 
    function admin_one(){

		var host = document.getElementById("host").value;
		var user = document.getElementById("user").value;
		var pass = document.getElementById("pass").value;     
    
       if((host != "") && (user != "") && (pass != "")){
      /*  Confirm the input */
        var r=confirm("You entered Host: " + host + ", MySql User: " + user + ", MySql Password: " + pass);
          if (r==true){
            
            //"You pressed OK!";
 
            $(document).ready(function(){

            $('#a_s').html('<img src="images/arrows16.gif"/>');        
			  
				    $.post('admin_two.php', {host:host, user:user, pass:pass}, function(result, status){				
						    if(status == 'success'){
								    $("#content_3").html(result);  
								    $("#a_s").html('');                  
                }
				    });				
		      });      
        } else {
        //"You pressed Cancel!";
					$("#user").html('');
					$("#pass").html('');                                    
        }         
      } else  {
      
        alert("Make sure all fields are filled");        
      
      }    
    }

/*  Splash screen for "Websites" and "Admin" */ 
    function splash(splash){
                     
          if(splash === "websites"){
        
            $(document).ready(function(){
               			  
				      $.post('splash_web.php', {}, function(result, status){				
						      if(status == 'success'){
								      $("#content_2").html(result);                    
                  }
				      });				
		        });          
          
          }else if(splash === "admin"){
          
            $(document).ready(function(){
                    
				        $.post('splash_admin.php', {}, function(result, status){				
						      if(status == 'success'){
								      $("#content_3").html(result);                    
                  }
				        });				                    
            });
          }                   
    }

/*  Create Child theme directory */ 
    function setChild(web, theme){
             
          $(document).ready(function(){

          $('#d').html('<img src="images/arrows16.gif"/>');        
			  
				  $.post('child_one.php', {web:web, theme:theme}, function(result, status){				
						  if(status == 'success'){
								  $("#content_2").html(result);  
								  $("#d").html('');                  
              }
				  });				
		    });
    }

/*  Resets a div in a page*/
    function resetDiv(){
      $("#content_2").html("");      
    }