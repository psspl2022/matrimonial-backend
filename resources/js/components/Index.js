import React from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';
import { BrowserRouter, Route, Routes, Switch } from "react-router-dom";
import Login from './admin-theme/authentication/Login';
import Register from './admin-theme/authentication/Register';
import SideBar from './admin-theme/layouts/Sidebar';
import TopBar from './admin-theme/layouts/Topbar';
import Footer from './admin-theme/layouts/Footer';
import Dashboard from './admin-theme/Dashboard';
import AddPackage from './admin-theme/AddPackage';
import ListPackage from './admin-theme/ListPackage';
import ListReligion from './admin-theme/ListReligion';
import ListCaste from './admin-theme/ListCaste';
import ListOccupation from './admin-theme/ListOccupation';
import ListHobbies from './admin-theme/ListHobbies';
import ListIntrests from './admin-theme/ListIntrests';
import ListEducation from './admin-theme/ListEducation';
import ListMotherTongue from './admin-theme/ListMotherTongue';
import ListSect from './admin-theme/ListSect';
import ListHeight from './admin-theme/ListHeight';
import ListIncome from './admin-theme/ListIncome';
import ListFamilyValue from './admin-theme/ListFamilyValue';
import ListFamilyType from './admin-theme/ListFamilyType';
import ListResidence from './admin-theme/ListResidence';

window.AppName = "Namdeo Matrimonial";
window.Url = "http://127.0.0.1:8000/";

function Index() {

    return (
        <>  
             <BrowserRouter>
                <Switch>               
                <Route path="/dashboard">  
                    <SideBar />
                    <div className="page-wrapper">
                    <TopBar />
                    <div className="page-content">                   
                    <Dashboard /> 
                    <Footer />
                    </div>
                    </div>
                </Route>    

                <Route path="/addPackage">  
                    <SideBar />                   
                    <div className="page-wrapper">   
                    <TopBar />
                    <div className="page-content">                  
                    <AddPackage /> 
                    <Footer />
                    </div>
                    </div>
                </Route>    

                <Route path="/listPackage">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <ListPackage /> 
                    <Footer />
                    </div> 
                    </div>
                </Route>    

                <Route path="/listReligion">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <ListReligion /> 
                    <Footer />
                    </div> 
                    </div>
                </Route>    

                <Route path="/listOccupation">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <ListOccupation /> 
                    <Footer />
                    </div> 
                    </div>
                </Route>    


                <Route path="/listCaste">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <ListCaste /> 
                    <Footer />
                    </div> 
                    </div>
                </Route>   

                <Route path="/listIntrests">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <ListIntrests /> 
                    <Footer />
                    </div> 
                    </div>
                </Route>    

                <Route path="/listMotherTongue">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <ListMotherTongue/> 
                    <Footer />
                    </div> 
                    </div>
                </Route>  

                <Route path="/listSect">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <ListSect/> 
                    <Footer />
                    </div> 
                    </div>
                </Route>    

                <Route path="/listFamilyType">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <ListFamilyType /> 
                    <Footer />
                    </div> 
                    </div>
                </Route>  

                <Route path="/listFamilyValue">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <ListFamilyValue /> 
                    <Footer />
                    </div> 
                    </div>
                </Route>    

                <Route path="/listEducation">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <ListEducation /> 
                    <Footer />
                    </div> 
                    </div>
                </Route>    

                <Route path="/listHeight">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <ListHeight /> 
                    <Footer />
                    </div> 
                    </div>
                </Route>    

                <Route path="/listIncome">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <ListIncome /> 
                    <Footer />
                    </div> 
                    </div>
                </Route>    

                <Route path="/listHobbies">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <ListHobbies /> 
                    <Footer />
                    </div> 
                    </div>
                </Route>    

                <Route path="/listIntrests">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <ListIntrests /> 
                    <Footer />
                    </div> 
                    </div>
                </Route>    


                <Route exact path="/" >
                      <Login />
                </Route> 
                </Switch>
            </BrowserRouter>             
        </>
    );
}



if (document.getElementById('index')) {
    ReactDOM.render(<Index />, document.getElementById('index'));
}

export default Index;

