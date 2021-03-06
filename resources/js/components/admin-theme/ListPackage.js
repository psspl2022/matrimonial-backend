import React from 'react';
import { useHistory } from "react-router-dom";
import {useState, useEffect} from 'react'
import axios from "axios";
import { Link } from 'react-router-dom';

function ListPackage(){
    
    const [data, setData] = useState([]);
   
    console.warn(data);

    const token = window.sessionStorage.getItem('access_token');
    const headers_data = {
      headers: {
        'authorization': 'Bearer ' + token,
        'Accept': 'application/json',
        'Content-Type': 'application/json'
      }
    }

    useEffect(() => {
        listData();
    }, []);

    useEffect(() => {
        $('#datatable').DataTable();
    },[data]);
  
    function listData(){
        axios.get("http://127.0.0.1:8000/api/getPackageList", headers_data)
        .then(({ data }) => {
          $('#datatable').DataTable().destroy();
          setData(data);          
        });
    }

    const updateStatus = (id, status) => {
        const update={
            id : id,
            status : status,
            model : "Package"
        }
        axios
        .post(`${window.Url}api/updateStatus`,update, headers_data)
        .then(response => {
            if (response.data.hasOwnProperty("msg")) {
                Swal.fire({
                  icon: "success",
                  title: response.data.msg,
                });
                listData();
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
                                        <h4 className="page-title">Package List</h4>
                                        <ol className="breadcrumb">
                                            <li className="breadcrumb-item"><Link >Home</Link></li>
                                            <li className="breadcrumb-item"><Link >Master</Link></li>
                                            <li className="breadcrumb-item"><Link >Package</Link></li>
                                            <li className="breadcrumb-item active">Package List</li>
                                        </ol>
                                    </div>
                                    <div className="col-auto align-self-center">
                                        <Link className="btn btn-sm btn-outline-primary" id="Dash_Date">
                                            <span className="day-name" id="Day_Name">Today:</span>&nbsp;
                                            <span className="" id="Select_date"></span>
                                            {/* <i data-feather="calendar" className="align-self-center icon-xs ml-1"></i> */}
                                        </Link>
                                        {/* <Link className="btn btn-sm btn-outline-primary">
                                            <i data-feather="download" className="align-self-center icon-xs"></i>
                                        </Link> */}
                                    </div>  
                                </div>                                                             
                            </div>
                        </div>
                    </div>
                 
                    <div className="row">
                        <div className="col-12">
                            <div className="card">
                                <div className="card-header">
                                    <h4 className="card-title">Package List</h4>
                                    {/* <p className="text-muted mb-0">DataTables has most features enabled by
                                        default, so all you need to do to use it with your own tables is to call
                                        the construction function: <code>$().DataTable();</code>.
                                    </p> */}
                                </div>
                                <div className="card-body">
                                
                                <table id="datatable" className="table table-bordered dt-responsive nowrap" style={{  borderCollapse:"collapse", borderSpacing: "0", width: "100%" }}>
                                         <thead>
                                        <tr>
                                            <th>Sno</th>
                                            <th>Package Name</th>
                                            <th>Package Price</th>
                                            <th>Package Credit</th>
                                            <th>View Count</th>
                                            <th>Shortlist count</th>
                                            <th></th>
                                        </tr>
                                        </thead>
    
    
                                        <tbody>
                                       
                                        {
                                            data.map((item)=>
                                            <tr>                                        
                                                <td>{ item.id }</td>
                                                <td>{ item.name }</td>
                                                <td>{ item.price }</td>
                                                <td>{ item.credit }</td>
                                                <td>{ item.view_count }</td>
                                                <td>{ item.shortlist_count }</td>
                                                <td name="buttons">
                                                <div className=" pull-right"><button  type="button" className="btn btn btn-soft-success btn-circle mr-2" ><i className="dripicons-pencil"></i></button><button type="button" className="btn btn btn-soft-danger btn-circle mr-2" ><i className="dripicons-trash" aria-hidden="true"></i></button><button type="button" className="btn btn-sm btn-soft-purple mr-2 btn-circle" style={{ display:"none" }} ><i className="dripicons-checkmark"></i></button><button type="button" className="btn btn-sm btn-soft-info btn-circle" style={{ display:"none" }} ><i className="dripicons-cross" aria-hidden="true"></i></button>
                                                
                                                 { item.status == 0 ?   <button  type="button"  onClick={e => updateStatus(item.id, 0)} className="btn  btn-sm btn-success btn-circle mr-2" >Active</button> : <button  type="button"  onClick={e => updateStatus(item.id, 1)} className="btn btn-sm btn-danger btn-circle mr-2" >Deactive</button> }                                          
                                                </div></td>
                                            </tr>
                                            )
                                        }
                                        
                        
                                        
                                        </tbody>
                                    </table>
    
                                </div>
                                
                            </div>
                        </div> 
                    </div> 
                </div>

               

        </>
      );
    }
    
export default ListPackage;
