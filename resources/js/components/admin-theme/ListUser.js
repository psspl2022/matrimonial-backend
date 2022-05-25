import React from 'react';
import { useHistory } from "react-router-dom";
import { useState, useEffect } from 'react'
import axios from "axios";
import { Link } from 'react-router-dom';


function ListUser() {

    const [data1, setData1] = useState([]);
    const [data2, setData2] = useState([]);

    const token = window.sessionStorage.getItem('access_token');
    const headers_data = {
        headers: {
            'authorization': 'Bearer ' + token,
            'Accept': 'application/json',
            'Content-Type': 'application/json'
        }
    }

    useEffect(() => {      
        userListData();
        adminListData();
    }, []);

    useEffect(() => {
        $('#datatable1').DataTable();
    },[data1]);

    useEffect(() => {
        $('#datatable2').DataTable();
    }, [data2]);

    function userListData(){
        axios.get("http://127.0.0.1:8000/api/getUserList", headers_data)
            .then(({ data }) => {
                $('#datatable1').DataTable().destroy();
                setData1(data);
        });
    }

    function adminListData() {
        axios.get("http://127.0.0.1:8000/api/getAdminList", headers_data)
            .then(({ data }) => {
                $('#datatable2').DataTable().destroy();
                setData2(data);

            });
    }


    const updateStatus = (id, status) => {
        const update = {
            id: id,
            status: status,
            model: "User"
        }
        axios
            .post(`${window.Url}api/updateStatus`, update, headers_data)
            .then(response => {
                if (response.data.hasOwnProperty("msg")) {
                    Swal.fire({
                        icon: "success",
                        title: response.data.msg,
                    });
                    adminListData();
                    // userListData();
                } else {
                    Swal.fire({
                        icon: "error",
                        title: response.data.errors,
                    });
                }
            }
            )
    }

    return (
        <>
            <div className="container-fluid">
                <div className="row">
                    <div className="col-sm-12">
                        <div className="page-title-box">
                            <div className="row">
                                <div className="col">
                                    <h4 className="page-title">User List</h4>
                                    <ol className="breadcrumb">
                                        <li className="breadcrumb-item"><Link >Home</Link></li>
                                        <li className="breadcrumb-item"><Link >Master</Link></li>
                                        <li className="breadcrumb-item"><Link >User</Link></li>
                                        <li className="breadcrumb-item active">User List</li>
                                    </ol>
                                </div>
                                <div className="col-auto align-self-center">
                                    <Link className="btn btn-sm btn-outline-primary" id="Dash_Date">
                                        <span className="day-name" id="Day_Name">Today:</span>&nbsp;
                                        <span className="" id="Select_date"></span>
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div className="row">
                    <div className="col-md-12 ">
                        <div className="card-body">
                            <ul className="nav nav-tabs" role="tablist">
                                <li className="nav-item">
                                    <a className="nav-link active" data-toggle="tab" href="#user" role="tab" aria-selected="true">User</a>
                                </li>
                                <li className="nav-item">
                                    <a className="nav-link " data-toggle="tab" href="#admin" role="tab" aria-selected="false">Admin</a>
                                </li>
                            </ul>

                            <div className="tab-content">
                                <div className="tab-pane p-3 active" id="user" role="tabpanel">
                                    <div className="row">
                                        <div className="col-12">
                                            <div className="card">
                                                <div className="card-header">
                                                    <h4 className="card-title">User List</h4>
                                                </div>
                                                <div className="card-body">

                                                    <table id="datatable1" className="table table-bordered dt-responsive nowrap" style={{ borderCollapse: "collapse", borderSpacing: "0", width: "100%" }}>
                                                    <thead>
                                                        <tr>
                                                            <th>Sno</th>
                                                            <th>User Type</th>
                                                            <th>Matrimonial ID</th>
                                                            <th>Name</th>
                                                            <th>Gender</th>
                                                            <th>Email</th>
                                                            <th>Profile For</th>
                                                            <th>Alternative Email</th>
                                                            <th>Contact</th>
                                                            <th>Alternative Contact</th>
                                                            <th>Landline</th>
                                                            <th>Contact Address</th>
                                                            <th>Parent Address</th>
                                                            <th>Time for Call</th>
                                                            <th>Stage</th>
                                                            <th>Added On</th>
                                                            <th></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        {
                                                            data1.map((item1) => {
                                                                return (
                                                                    <tr>
                                                                        <td>{item1.id}</td>
                                                                        <td>{item1.user_type == 1 ? 'User' : ''}</td>     
                                                                        <td>{item1.get_user.matrimony_id}</td>
                                                                        <td>{item1.name}</td>
                                                                        <td>{item1.get_user.gender == 1 && 'Male'} {item1.get_user.gender == 2 && 'Female'} {item1.get_user.gender == 3 && 'Other'}</td>
                                                                        <td>{item1.get_user.email}</td>
                                                                        <td>{item1.get_user.profile_for}</td>
                                                                        <td>{item1.get_user.alter_email}</td>
                                                                        <td>{item1.get_user.contact}</td>
                                                                        <td>{item1.get_user.alter_contact}</td>
                                                                        <td>{item1.get_user.landline}</td>
                                                                        <td>{item1.get_user.contact_address} {item1.get_user.contact_pincode} </td>
                                                                        <td>{item1.get_user.parent_address} {item1.get_user.parent_pincode}</td>
                                                                        <td>{item1.get_user.time_for_call}</td>
                                                                        <td>{item1.get_user.stage_no}</td>
                                                                        <td>{item1.get_user.created_on}</td>
                                                                        <td name="buttons">
                                                                            <div className=" pull-right"><button type="button" className="btn btn btn-soft-success btn-circle mr-2" ><i className="dripicons-pencil"></i></button><button type="button" className="btn btn btn-soft-danger btn-circle mr-2" ><i className="dripicons-trash" aria-hidden="true"></i></button><button type="button" className="btn btn-sm btn-soft-purple mr-2 btn-circle" style={{ display: "none" }} ><i className="dripicons-checkmark"></i></button><button type="button" className="btn btn-sm btn-soft-info btn-circle" style={{ display: "none" }}><i className="dripicons-cross" aria-hidden="true"></i></button>

                                                                                {item1.status == 0 && item1.get_user.status == 0 && <button type="button" onClick={e => updateStatus(item1.id, 0)} className="btn  btn-sm btn-success btn-circle mr-2" >Active</button>}
                                                                                {item1.status == 1 && item1.get_user.status == 1 && <button type="button" onClick={e => updateStatus(item1.id, 1)} className="btn btn-sm btn-danger btn-circle mr-2" >Deactive</button>}

                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                                );
                                                            })
                                                        }
                                                    </tbody>
                                                    </table>

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div className="tab-pane p-3 " id="admin" role="tabpanel">
                                    <div className="row">
                                        <div className="col-12">
                                            <div className="card">
                                                <div className="card-header">
                                                    <h4 className="card-title">Admin List</h4>
                                                </div>
                                                <div className="card-body">
                                                <table id="datatable2" className="table table-bordered dt-responsive nowrap no-footer dtr-inline "  style={{ borderCollapse: "collapse", borderSpacing: "0", width: "100%" }}>
                                                        <thead>
                                                            <tr>
                                                                <th>Sno</th>
                                                                <th>User Type</th>
                                                                <th>Name</th>
                                                                <th>Gender</th>
                                                                <th>Contact</th>
                                                                <th>Email</th>
                                                                <th>Country</th>
                                                                <th>State</th>
                                                                <th>City</th>
                                                                <th>Address</th>
                                                                <th>Added On</th>
                                                                <th></th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            {
                                                                data2.map((item) => {
                                                                    return (
                                                                        <tr>
                                                                            <td>{item.id}</td>
                                                                            <td>{item.user_type == 2 ? 'Admin' : 'R M'}</td>
                                                                            <td>{item.get_admin.name}</td>
                                                                            <td>{item.get_admin.gender == 1 && 'Male'} {item.get_admin.gender == 2 && 'Female'} {item.get_admin.gender == 3 && 'Other'}</td>
                                                                            <td>{item.get_admin.contact}</td>
                                                                            <td>{item.get_admin.email}</td>
                                                                            <td>{item.get_country.cname}</td>
                                                                            <td>{item.get_state.sname}</td>
                                                                            <td>{item.get_city.ciname}</td>
                                                                            <td>{item.get_admin.address}</td>
                                                                            <td>{item.get_admin.created_on}</td>
                                                                            <td name="buttons">
                                                                                <div className=" pull-right"><button type="button" className="btn btn btn-soft-success btn-circle mr-2" ><i className="dripicons-pencil"></i></button><button type="button" className="btn btn btn-soft-danger btn-circle mr-2" ><i className="dripicons-trash" aria-hidden="true"></i></button><button type="button" className="btn btn-sm btn-soft-purple mr-2 btn-circle" style={{ display: "none" }} ><i className="dripicons-checkmark"></i></button><button type="button" className="btn btn-sm btn-soft-info btn-circle" style={{ display: "none" }}><i className="dripicons-cross" aria-hidden="true"></i></button>

                                                                                    {item.status == 0 && item.get_admin.r_status == 0 && <button type="button" onClick={e => updateStatus(item.id, 0)} className="btn  btn-sm btn-success btn-circle mr-2" >Active</button>}
                                                                                    {item.status == 1 && item.get_admin.r_status == 1 && <button type="button" onClick={e => updateStatus(item.id, 1)} className="btn btn-sm btn-danger btn-circle mr-2" >Deactive</button>}

                                                                                </div>
                                                                            </td>
                                                                        </tr>
                                                                    );
                                                                })
                                                            }
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

          


        </>
    );
}

export default ListUser;
