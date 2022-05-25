import React from 'react';
import { useHistory } from "react-router-dom";
import {useState, useEffect} from 'react'
import axios from "axios";
import { Link } from 'react-router-dom';

function Topbar(){
    
    const history = new useHistory();
    const [userData, setUserData] = useState({});

    useEffect(() => {
		if(!sessionStorage.hasOwnProperty("access_token")){
		history.replace('/');
		}
        if(sessionStorage.hasOwnProperty("user_data")){
			const user_data = window.sessionStorage.getItem('user_data');
			setUserData(JSON.parse(user_data));
		}	
	},[]);

    const logout = async (e) => {
		e.preventDefault();
		
		const token = window.sessionStorage.getItem("access_token");
		const headers_param = {
		  headers: {
			authorization: "Bearer " + token,
			Accept: "application/json",
			"Content-Type": "application/json"
		  },
		};
	
		await axios
		  .get(`${window.Url}api/logout`, headers_param)
		  .then(({ data }) => {
			if (data.hasOwnProperty("message")) {
			  Swal.fire({
				icon: "success",
				text: data.message,
			  });
			  window.sessionStorage.removeItem('access_token');
          	  window.sessionStorage.removeItem('user_data');
			  history.go(0);
			} else {
			  Swal.fire({
				icon: "error",
				text: data.message,
			  });
			}
		  });
	  };

    return(  
        <>
       
       <div className="topbar">            
               
                <nav className="navbar-custom">    
                    <ul className="list-unstyled topbar-nav float-right mb-0">  
                        <li className="dropdown hide-phone">
                            <Link className="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" to="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <i data-feather="search" className="topbar-icon"></i>
                            </Link>
                            
                            <div className="dropdown-menu dropdown-menu-right dropdown-lg p-0">
                                
                                <div className="app-search-topbar">
                                    <form action="#" method="get">
                                        <input type="search" name="search" className="from-control top-search mb-0" placeholder="Type text..." />
                                        <button type="submit"><i className="ti-search"></i></button>
                                    </form>
                                </div>
                            </div>
                        </li>                      

                        <li className="dropdown notification-list">
                            <Link className="nav-link dropdown-toggle arrow-none waves-light waves-effect" data-toggle="dropdown" to="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <i data-feather="bell" className="align-self-center topbar-icon"></i>
                                <span className="badge badge-danger badge-pill noti-icon-badge">2</span>
                            </Link>
                            <div className="dropdown-menu dropdown-menu-right dropdown-lg pt-0">
                            
                                <h6 className="dropdown-item-text font-15 m-0 py-3 border-bottom d-flex justify-content-between align-items-center">
                                    Notifications <span className="badge badge-primary badge-pill">2</span>
                                </h6> 
                                <div className="notification-menu" data-simplebar>
                                
                                    <Link to="#" className="dropdown-item py-3">
                                        <small className="float-right text-muted pl-2">2 min ago</small>
                                        <div className="media">
                                            <div className="avatar-md bg-soft-primary">
                                                <i data-feather="shopping-cart" className="align-self-center icon-xs"></i>
                                            </div>
                                            <div className="media-body align-self-center ml-2 text-truncate">
                                                <h6 className="my-0 font-weight-normal text-dark">Your order is placed</h6>
                                                <small className="text-muted mb-0">Dummy text of the printing and industry.</small>
                                            </div>
                                        </div>
                                    </Link>
                                    <Link to="#" className="dropdown-item py-3">
                                        <small className="float-right text-muted pl-2">10 min ago</small>
                                        <div className="media">
                                            <div className="avatar-md bg-soft-primary">
                                                <img src="assets/images/users/user-4.jpg" alt="" className="thumb-sm rounded-circle" />
                                            </div>
                                            <div className="media-body align-self-center ml-2 text-truncate">
                                                <h6 className="my-0 font-weight-normal text-dark">Meeting with designers</h6>
                                                <small className="text-muted mb-0">It is a long established fact that a reader.</small>
                                            </div>
                                        </div>
                                    </Link>

                                    <Link to="#" className="dropdown-item py-3">
                                        <small className="float-right text-muted pl-2">40 min ago</small>
                                        <div className="media">
                                            <div className="avatar-md bg-soft-primary">                                                    
                                                <i data-feather="users" className="align-self-center icon-xs"></i>
                                            </div>
                                            <div className="media-body align-self-center ml-2 text-truncate">
                                                <h6 className="my-0 font-weight-normal text-dark">UX 3 Task complete.</h6>
                                                <small className="text-muted mb-0">Dummy text of the printing.</small>
                                            </div>
                                        </div>
                                    </Link>
                                  
                                    <Link to="#" className="dropdown-item py-3">
                                        <small className="float-right text-muted pl-2">1 hr ago</small>
                                        <div className="media">
                                            <div className="avatar-md bg-soft-primary">
                                                <img src="assets/images/users/user-5.jpg" alt="" className="thumb-sm rounded-circle" />
                                            </div>
                                            <div className="media-body align-self-center ml-2 text-truncate">
                                                <h6 className="my-0 font-weight-normal text-dark">Your order is placed</h6>
                                                <small className="text-muted mb-0">It is a long established fact that a reader.</small>
                                            </div>
                                        </div>
                                    </Link>
                                   
                                    <Link to="#" className="dropdown-item py-3">
                                        <small className="float-right text-muted pl-2">2 hrs ago</small>
                                        <div className="media">
                                            <div className="avatar-md bg-soft-primary">
                                                <i data-feather="check-circle" className="align-self-center icon-xs"></i>
                                            </div>
                                            <div className="media-body align-self-center ml-2 text-truncate">
                                                <h6 className="my-0 font-weight-normal text-dark">Payment Successfull</h6>
                                                <small className="text-muted mb-0">Dummy text of the printing.</small>
                                            </div>
                                        </div>
                                    </Link>
                                </div>
                           
                                <Link to="javascript:void(0);" className="dropdown-item text-center text-primary">
                                    View all <i className="fi-arrow-right"></i>
                                </Link>
                            </div>
                        </li>

                        <li className="dropdown">
                            <Link className="nav-link dropdown-toggle waves-effect waves-light nav-user" data-toggle="dropdown" to="#" role="button"
                                aria-haspopup="false" aria-expanded="false">
                                <span className="ml-1 mr-2 nav-user-name hidden-sm">Hi! {userData.name}</span>
                                {/* <img src="assets/images/users/user-5.jpg" alt="profile-user" className="rounded-circle thumb-xs" />                                  */}
                            </Link>
                            <div className="dropdown-menu dropdown-menu-right">
                                {/* <Link className="dropdown-item" to="#"><i data-feather="user" className="align-self-center icon-xs icon-dual mr-1"></i> Profile</Link>
                                <Link className="dropdown-item" to="#"><i data-feather="settings" className="align-self-center icon-xs icon-dual mr-1"></i> Settings</Link> */}
                                <div className="dropdown-divider mb-0"></div>
                                <Link className="dropdown-item" onClick={logout}><i data-feather="power" className="align-self-center icon-xs icon-dual mr-1"></i> Logout</Link>
                            </div>
                        </li>
                    </ul>
        
                    <ul className="list-unstyled topbar-nav mb-0">                        
                        <li>
                            <button className="nav-link button-menu-mobile">
                                <i data-feather="menu" className="align-self-center topbar-icon"></i>
                            </button>
                        </li> 
                        <li className="creat-btn">
                            <div className="nav-link">
                                <Link className=" btn btn-sm btn-soft-primary" to="#" role="button"><i className="fas fa-plus mr-2"></i>New Task</Link>
                            </div>                                
                        </li>                           
                    </ul>
                </nav>
                
            </div>
        
        </>
    );
}

export default Topbar;
