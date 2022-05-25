import { useState, useEffect } from "react";
import axios from "axios";
import { useHistory } from "react-router-dom";
import { Link } from 'react-router-dom';

function AddUser(){

    const [countries, setCountries] = useState([]);  
    const [states, setStates] = useState([]);
    const [cities, setCities] = useState([]);

    const[data, setData] =  useState({
        name: "",
        user_type: "",
        email: "",
        contact: "",
        gender: "",
        country: "",
        state: "",
        city: "",
        address: ""
    });

    let history = useHistory();
    const token = window.sessionStorage.getItem('access_token');
    const headers_data = {
        headers: {
            'authorization': 'Bearer ' + token,
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    }

    useEffect(() => {
        axios
          .get(`${window.Url}api/countryDropdown`, headers_data)
          .then(({ data }) => {
            setCountries(
              data.country.map(function (country) {
                return { id: country.id, name: country.name };
              })
            );
          });
      }, []);

    useEffect(() => {
        axios
          .get(`${window.Url}api/stateDropdown/${data['country']}`, headers_data)
          .then(({ data }) => {
            setStates(
              data.state.map(function (state) {
                return { id: state.id, name: state.name };
              })
            );
          });
      }, [data['country']]);
    
      useEffect(() => {
        axios
          .get(`${window.Url}api/cityDropdown/${data['state']}`, headers_data)
          .then(({ data }) => {
            setCities(
              data.city.map(function (city) {
                return { id: city.id, name: city.name };
              })
            );
          });
      }, [data['state']]);

    const {name,user_type,email,contact,gender,country,state,city,address} = data;
    const onInputChange = (e) => {
    setData({ ...data, [e.target.name]:e.target.value});
    }

    const addUser = () => {
        axios
        .post(`${window.Url}api/adminRegister`,data, headers_data)
        .then(response => {
            if (response.data.hasOwnProperty("msg")) {
                Swal.fire({
                  icon: "success",
                  title: response.data.msg,
                });
                history.replace("/dashboard");
              } else {
                Swal.fire({
                  icon: "error",
                  title: response.data.errors,
                });
              }
            }
        )
    }

    return(
        <>

    <div className="container-fluid">
        <div className="row">
            <div className="col-sm-12">
                <div className="page-title-box">
                    <div className="row">
                        <div className="col">
                            <h4 className="page-title">Add User</h4>
                            <ol className="breadcrumb">
                                <li className="breadcrumb-item"><Link>Home</Link></li>
                                <li className="breadcrumb-item active">User</li>
                            </ol>
                        </div>
                        <div className="col-auto align-self-center">
                            <Link className="btn btn-sm btn-outline-primary" id="Dash_Date">
                                <span className="ay-name" id="Day_Name">Today:</span>&nbsp;
                                <span className="" id="Select_date">Jan 11</span>
                                <i data-feather="calendar" className="align-self-center icon-xs ml-1"></i>
                            </Link>
                            <Link  className="btn btn-sm btn-outline-primary">
                                <i data-feather="download" className="align-self-center icon-xs"></i>
                            </Link>
                        </div>
                    </div>                                                              
                </div>
            </div>
        </div>
        <div className="row">
        <div className="col-10 mx-auto">
        <form>
            <div className="row form-group">
                
                <div className="col-8">
                <label >Name</label>
                <input type="text" className="form-control" name="name"  value={name} onChange={e => onInputChange(e)}  placeholder="Enter name" />
                </div>
                <div className="col-4">
                    <label >User Type</label>
                    <select className="select2 form-control mb-3 custom-select" name="user_type" value={user_type} onChange={e => onInputChange(e)} style={{width: "100%", height:"36px"}}>
                        <option>Select</option>
                        <option value="3">Relationship Manager</option>
                            
                    </select>
                </div>
            </div>
            <div className="row form-group">
                <div className="col-4">
                    <label >Gender</label>
                    <select className="select2 form-control mb-3 custom-selection" name="gender" value={gender} onChange={e => onInputChange(e)} style={{width: "100%", height:"36px"}}>
                        <option>Select</option>
                            <option value="1">Male</option>
                            <option value="2">Female</option>                           
                            <option value="3">Other</option>
                    </select>
                </div>
                <div className="col-4">
                    <label >Email</label>
                    <input type="email" name="email" value={email} onChange={e => onInputChange(e)}  className="form-control"  placeholder="Enter email" />
                </div>
                <div className="col-4">
                    <label >Contact</label>
                    <input type="text" name="contact" value={contact} onChange={e => onInputChange(e)}  className="form-control"  placeholder="Enter contact" />
                </div>              
            </div>
            <div className="row form-group">
                <div className="col-4">
                    <label >Country</label>
                    <select className="select2 form-control mb-3 custom-select" onChange={e => onInputChange(e)} name="country" style={{width: "100%", height:"36px"}}>
                        <option>Select</option>
                        {
                        countries.map((item)=>
                            <option value={item.id}>{item.name}</option>
                        )}
                    </select>
                </div>
                <div className="col-4">
                    <label >State</label>
                    <select className="select2 form-control mb-3 custom-select" onChange={e => onInputChange(e)}  name="state" style={{width: "100%", height:"36px"}}>
                        <option>Select</option>
                        {
                        states.map((item)=>
                            <option value={item.id}>{item.name}</option>
                        )}  
                    </select>
                </div>
                <div className="col-4">
                    <label >City</label>
                    <select className="select2 form-control mb-3 custom-select" onChange={e => onInputChange(e)}  name="city" style={{width: "100%", height:"36px"}}>
                        <option>Select</option>
                        {
                        cities.map((item)=>
                            <option value={item.id}>{item.name}</option>
                        )}     
                    </select>
                </div>
            </div>
            <div className="form-group">
                <label >Address</label>
                <textarea id="textarea" className="form-control" value={address} onChange={e => onInputChange(e)}  name="address"rows="3" placeholder="Enter Address"></textarea>
            </div>
            <button type="button" onClick={addUser} className="btn btn-primary mr-2">Submit</button>
            <button type="button" className="btn btn-danger">Cancel</button>
        </form>
        </div>
     
    </div>
</div>
        </>
    );
}

export default AddUser;