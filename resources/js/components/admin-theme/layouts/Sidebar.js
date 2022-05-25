
import { hasIn } from 'lodash';
import { Link } from 'react-router-dom';

function SideBar(){
    return(
        <>
         <div className="left-sidenav">
            <div className="brand">
                <Link to="index.html" className="logo">
                    <span>
                        {/* <img src="./admin-theme/assets/images/logo-sm.png" alt="logo-small" className="logo-sm" /> */}
                    </span>
                    <span>
                        {/* <img src="./admin-theme/assets/images/logo.png" alt="logo-large" className="logo-lg logo-light" />
                        <img src="./admin-theme/assets/images/logo-dark.png" alt="logo-large" className="logo-lg logo-dark" /> */}
                     <img src="images/matrimonial_logo.png" alt="" style={{maxHeight:'60px'}} className="auth-logo" />
                    </span>
                </Link>
            </div>
      
            <div className="menu-content h-100" data-simplebar>
                <ul className="metismenu left-sidenav-menu">
                    <li className="menu-label mt-0">Main</li>
                    <li>
                        <Link> <i data-feather="home" className="align-self-center menu-icon"></i><span>Dashboard</span><span className="menu-arrow"><i className="mdi mdi-chevron-right"></i></span></Link>
                    </li>

                    <li>
                        <Link><i data-feather="user" className="align-self-center menu-icon"></i><span>Users</span><span className="menu-arrow"><i className="mdi mdi-chevron-right"></i></span></Link>
                        <ul className="nav-second-level" aria-expanded="false">
                            <li>
                                <Link ><i className="ti-control-record"></i>User <span className="menu-arrow left-has-menu"><i className="mdi mdi-chevron-right"></i></span></Link>
                                <ul className="nav-second-level" aria-expanded="false">
                                    <li><Link to="/addUser">Add User</Link></li>
                                    <li><Link to="/listUser">User List</Link></li>
                                </ul>
                            </li>  
                        </ul>
                    </li>

                    <li>
                        <Link><i data-feather="grid" className="align-self-center menu-icon"></i><span>Master</span><span className="menu-arrow"><i className="mdi mdi-chevron-right"></i></span></Link>
                        <ul className="nav-second-level" aria-expanded="false">
                            <li>
                                <Link ><i className="ti-control-record"></i>Package <span className="menu-arrow left-has-menu"><i className="mdi mdi-chevron-right"></i></span></Link>
                                <ul className="nav-second-level" aria-expanded="false">
                                    <li><Link to="/addPackage">Add Package</Link></li>
                                    <li><Link to="/listPackage">Package List</Link></li>
                                </ul>
                            </li> 
                            <li>
                                <Link ><i className="ti-control-record"></i>Religion <span className="menu-arrow left-has-menu"><i className="mdi mdi-chevron-right"></i></span></Link>
                                <ul className="nav-second-level" aria-expanded="false">
                                    <li><Link to="/addReligion">Add Religion</Link></li>
                                    <li><Link to="/listReligion">Religion List</Link></li>
                                </ul>
                            </li>
                            <li>
                                <Link ><i className="ti-control-record"></i>Caste <span className="menu-arrow left-has-menu"><i className="mdi mdi-chevron-right"></i></span></Link>
                                <ul className="nav-second-level" aria-expanded="false">
                                    <li><Link to="/addCaste">Add Caste</Link></li>
                                    <li><Link to="/listCaste">Caste List</Link></li>
                                </ul>
                            </li> 
                            <li>
                                <Link ><i className="ti-control-record"></i>Mother Tongue <span className="menu-arrow left-has-menu"><i className="mdi mdi-chevron-right"></i></span></Link>
                                <ul className="nav-second-level" aria-expanded="false">
                                    <li><Link to="/addMotherTongue">Add Mother Tongue</Link></li>
                                    <li><Link to="/listMotherTongue">Mother Tongue List</Link></li>
                                </ul>
                            </li> 
                            <li>
                                <Link ><i className="ti-control-record"></i>Sects <span className="menu-arrow left-has-menu"><i className="mdi mdi-chevron-right"></i></span></Link>
                                <ul className="nav-second-level" aria-expanded="false">
                                    <li><Link to="/addSect">Add Sect</Link></li>
                                    <li><Link to="/listSect">Sect List</Link></li>
                                </ul>
                            </li> 
                            <li>
                            <Link ><i className="ti-control-record"></i>Family Type <span className="menu-arrow left-has-menu"><i className="mdi mdi-chevron-right"></i></span></Link>
                                <ul className="nav-second-level" aria-expanded="false">
                                    <li><Link to="/addFamilyType">Add Family Type</Link></li>
                                    <li><Link to="/listFamilyType">Family Type List</Link></li>
                                </ul>
                            </li>
                            <li>
                            <Link ><i className="ti-control-record"></i>Family Value <span className="menu-arrow left-has-menu"><i className="mdi mdi-chevron-right"></i></span></Link>
                                <ul className="nav-second-level" aria-expanded="false">
                                    <li><Link to="/addFamilyValue">Add Family Value</Link></li>
                                    <li><Link to="/listFamilyValue">Family Value List</Link></li>
                                </ul>
                            </li> 
                            <li>
                            <Link ><i className="ti-control-record"></i>Height <span className="menu-arrow left-has-menu"><i className="mdi mdi-chevron-right"></i></span></Link>
                                <ul className="nav-second-level" aria-expanded="false">
                                    <li><Link to="/addHeight">Add Height</Link></li>
                                    <li><Link to="/listHeight">Height List</Link></li>
                                </ul>
                            </li> 
                            <li>
                            <Link ><i className="ti-control-record"></i>Residence <span className="menu-arrow left-has-menu"><i className="mdi mdi-chevron-right"></i></span></Link>
                                <ul className="nav-second-level" aria-expanded="false">
                                    <li><Link to="/addResidence">Add Residence</Link></li>
                                    <li><Link to="/listResidence">Residence List</Link></li>
                                </ul>
                            </li> 
                            <li>
                            <Link ><i className="ti-control-record"></i>Hobbies <span className="menu-arrow left-has-menu"><i className="mdi mdi-chevron-right"></i></span></Link>
                                <ul className="nav-second-level" aria-expanded="false">
                                    <li><Link to="/addHobby">Add Hobby</Link></li>
                                    <li><Link to="/listHobbies">Hobbies List</Link></li>
                                </ul>
                            </li>    
                            <li>
                            <Link ><i className="ti-control-record"></i>Intrest<span className="menu-arrow left-has-menu"><i className="mdi mdi-chevron-right"></i></span></Link>
                                <ul className="nav-second-level" aria-expanded="false">
                                    <li><Link to="/addIntrest">Add Intrest</Link></li>
                                    <li><Link to="/listIntrests">Intrest List</Link></li>
                                </ul>
                            </li>    
                            <li>
                            <Link ><i className="ti-control-record"></i>Education<span className="menu-arrow left-has-menu"><i className="mdi mdi-chevron-right"></i></span></Link>
                                <ul className="nav-second-level" aria-expanded="false">
                                    <li><Link to="/addEducation">Add Qualification</Link></li>
                                    <li><Link to="/listEducation">Qualification List</Link></li>
                                </ul>
                            </li>      
                            <li>
                            <Link ><i className="ti-control-record"></i>Occupation<span className="menu-arrow left-has-menu"><i className="mdi mdi-chevron-right"></i></span></Link>
                                <ul className="nav-second-level" aria-expanded="false">
                                    <li><Link to="/addOccupation">Add Occupation</Link></li>
                                    <li><Link to="/listOccupation">Occupation List</Link></li>
                                </ul>
                            </li> 
                            <li>
                            <Link ><i className="ti-control-record"></i>Income <span className="menu-arrow left-has-menu"><i className="mdi mdi-chevron-right"></i></span></Link>
                                <ul className="nav-second-level" aria-expanded="false">
                                    <li><Link to="/addIncome">Add Income</Link></li>
                                    <li><Link to="/listIncome">Income List</Link></li>
                                </ul>
                            </li> 
                             
                            <li className="nav-item"><Link className="nav-link" to="apps-chat.html"><i className="ti-control-record"></i>Chat</Link></li>
                        </ul>
                    </li>    
                  
                </ul>
    
                
            </div>
        </div>
        </>
    );
}

export default SideBar;
