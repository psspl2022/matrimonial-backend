import { useState, useEffect } from "react";
import axios from "axios";
import { useHistory } from "react-router-dom";
import { Link } from 'react-router-dom';

function AddOccupation(){
    const[data, setData] =  useState({
        occupation: "",
        occupation_category: ""
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

    const {occupation,occupation_category} = data;
    const onInputChange = (e) => {
    setData({ ...data, [e.target.name]:e.target.value});
    }

    const addOccupation = () => {
        axios
        .post(`${window.Url}api/addOccupation`,data, headers_data)
        .then(response => {
            if (response.data.hasOwnProperty("msg")) {
                Swal.fire({
                  icon: "success",
                  title: response.data.msg,
                });
                history.replace("/listOccupation");
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
                            <h4 className="page-title">Add Occupation</h4>
                            <ol className="breadcrumb">
                                <li className="breadcrumb-item"><Link>Home</Link></li>
                                <li className="breadcrumb-item active">Occupation</li>
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
        <div className="form-group">
                <label >Occupation Category</label>
                <input type="text" name="occupation_category" value={occupation_category} onChange={e => onInputChange(e)} className="form-control"  placeholder="Enter Occupation Category " />
            </div>
            <div className="form-group">
                <label >Occupation</label>
                <input type="text" name="occupation" value={occupation} onChange={e => onInputChange(e)} className="form-control"  placeholder="Enter Occupation " />
            </div>
            <button type="button" onClick={addOccupation} className="btn btn-primary mr-2">Submit</button>
            <button type="button" className="btn btn-danger">Cancel</button>
        </form>
        </div>
     
    </div>
</div>
        </>
    );
}

export default AddOccupation;