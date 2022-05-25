import React from 'react';
import ReactDOM from 'react-dom';
import { Link } from 'react-router-dom';
import { BrowserRouter, Route, Routes, Switch } from "react-router-dom";
import Login from './admin-theme/authentication/Login';
import SideBar from './admin-theme/layouts/Sidebar';
import TopBar from './admin-theme/layouts/Topbar';
import Footer from './admin-theme/layouts/Footer';
import Dashboard from './admin-theme/Dashboard';
import AddUser from './admin-theme/AddUser';
import ListUser from './admin-theme/ListUser';
import AddPackage from './admin-theme/AddPackage';
import ListPackage from './admin-theme/ListPackage';
import AddReligion from './admin-theme/AddReligion';
import ListReligion from './admin-theme/ListReligion';
import AddCaste from './admin-theme/AddCaste';
import ListCaste from './admin-theme/ListCaste';
import AddOccupation from './admin-theme/AddOccupation';
import ListOccupation from './admin-theme/ListOccupation';
import AddHobby from './admin-theme/AddHobby';
import ListHobbies from './admin-theme/ListHobbies';
import AddIntrest from './admin-theme/AddIntrest';
import ListIntrests from './admin-theme/ListIntrests';
import AddEducation from './admin-theme/AddEducation';
import ListEducation from './admin-theme/ListEducation';
import AddMotherTongue from './admin-theme/AddMotherTongue';
import ListMotherTongue from './admin-theme/ListMotherTongue';
import AddSect from './admin-theme/AddSect';
import ListSect from './admin-theme/ListSect';
import AddHeight from './admin-theme/AddHeight';
import ListHeight from './admin-theme/ListHeight';
import AddIncome from './admin-theme/AddIncome';
import ListIncome from './admin-theme/ListIncome';
import AddFamilyValue from './admin-theme/AddFamilyValue';
import ListFamilyValue from './admin-theme/ListFamilyValue';
import AddFamilyType from './admin-theme/AddFamilyType';
import ListFamilyType from './admin-theme/ListFamilyType';
import AddResidence from './admin-theme/AddResidence';
import ListResidence from './admin-theme/ListResidence';
import "../../css/app.css";

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

                 <Route path="/addUser">  
                    <SideBar />                   
                    <div className="page-wrapper">   
                    <TopBar />
                    <div className="page-content">                  
                    <AddUser /> 
                    <Footer />
                    </div>
                    </div>
                </Route>    

                <Route path="/listUser">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <ListUser /> 
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

                <Route path="/addReligion">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <AddReligion /> 
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

                <Route path="/addOccupation">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <AddOccupation /> 
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

                <Route path="/addCaste">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <AddCaste /> 
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

                <Route path="/addIntrest">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <AddIntrest /> 
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

                <Route path="/addMotherTongue">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <AddMotherTongue/> 
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

                <Route path="/addSect">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <AddSect/> 
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

                <Route path="/addFamilyType">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <AddFamilyType /> 
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

                <Route path="/addFamilyValue">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <AddFamilyValue /> 
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

                <Route path="/addEducation">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <AddEducation /> 
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

                <Route path="/addHeight">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <AddHeight /> 
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

                <Route path="/addResidence">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <AddResidence /> 
                    <Footer />
                    </div> 
                    </div>
                </Route> 

                <Route path="/listResidence">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <ListResidence /> 
                    <Footer />
                    </div> 
                    </div>
                </Route>    

                <Route path="/addIncome">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <AddIncome /> 
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

                <Route path="/addHobby">  
                    <SideBar />
                    <div className="page-wrapper">  
                    <TopBar />  
                    <div className="page-content">                 
                    <AddHobby /> 
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

