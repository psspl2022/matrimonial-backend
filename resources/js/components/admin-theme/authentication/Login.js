import React from 'react';
import { useHistory } from "react-router-dom";
import {useState, useEffect} from 'react'
import axios from "axios";
function Login() {

     

        // const[email, setEmail] = useState('');
        // const[password, setPassword] = useState('');

        const history = useHistory();
        const[user, setUser] =  useState({
            email: "",
            password: ""
        });

        useEffect(() => {
            if(sessionStorage.hasOwnProperty("access_token")){
            history.replace('/dashboard');
            }
        },[]);

        const {email,password} = user;
        const onInputChange = (e) => {
        setUser({ ...user, [e.target.name]:e.target.value});
        }
    
    const signIn = () =>
    {
        
        axios.post("http://127.0.0.1:8000/api/login",user)
        .then(response => {
            if (response.data.hasOwnProperty("msg")) {
                Swal.fire({
                  icon: "success",
                  title: response.data.msg,
                });
                window.sessionStorage.setItem('access_token', response.data.token);
                window.sessionStorage.setItem('user_data',JSON.stringify(response.data.user))
                history.replace("/dashboard");
              } else {
                Swal.fire({
                  icon: "error",
                  title: response.data.error,
                });
              }

        })


    }


    return (
        <>
        <div className="container">
            <div className="row vh-100 d-flex justify-content-center">
                <div className="col-12 align-self-center">
                    <div className="row">
                        <div className="col-lg-5 mx-auto">
                            <div className="card">
                                <div className="card-body p-0 auth-header-box">
                                    <div className="text-center p-3">
                                        <a href="index.html" className="logo logo-admin">
                                        <img src="images/matrimonial_logo.png" alt="" style={{maxHeight:'60px'}} className="auth-logo" />
                                        </a>
                                        <h4 className="mt-3 mb-1 font-weight-semibold text-white font-18">Let's Get Started Dastone</h4>   
                                        <p className="text-muted  mb-0">Sign in to continue to {window.AppName}.</p>  
                                    </div>
                                </div>
                                <div className="card-body p-0">
                                    <ul className="nav-border nav nav-pills" role="tablist">
                                        <li className="nav-item">
                                            <a className="nav-link active font-weight-semibold" data-toggle="tab" href="#LogIn_Tab" role="tab">Log In</a>
                                        </li>
                                        {/* <li className="nav-item">
                                            <a className="nav-link font-weight-semibold" data-toggle="tab" href="#Register_Tab" role="tab">Register</a>
                                        </li> */}
                                    </ul>
                                    <div className="tab-content">
                                        <div className="tab-pane active p-3" id="LogIn_Tab" role="tabpanel">                                        
                                            <form className="form-horizontal auth-form" >
                
                                                <div className="form-group mb-2">
                                                    <label>Email</label>
                                                    <div className="input-group">                                                                                         
                                                        <input type="email" name="email" value={email} onChange={e => onInputChange(e)} className="form-control"placeholder="Enter email" />
                                                    </div>                                    
                                                </div>                    
                                                <div className="form-group mb-4">
                                                    <label>Password</label>                                            
                                                    <div className="input-group">                                  
                                                        <input type="password" name="password" value={password} onChange={e => onInputChange(e)} className="form-control" placeholder="Enter password" />
                                                    </div>                               
                                                </div>
                    
                                                {/* <div className="form-group row my-3">
                                                    <div className="col-sm-6">
                                                         <div className="custom-control custom-switch switch-success">
                                                            <input type="checkbox" className="custom-control-input" id="customSwitchSuccess" />
                                                            <label className="custom-control-label text-muted" for="customSwitchSuccess">Remember me</label>
                                                        </div> 
                                                    </div> 
                                                </div> 
                                                    <div className="col-sm-6 text-right">
                                                        <a href="auth-recover-pw.html" className="text-muted font-13"><i className="dripicons-lock"></i> Forgot password?</a>                                    
                                                    </div>*/}
                    
                                                <div className="form-group mb-0 row">
                                                    <div className="col-12">
                                                        <button onClick={signIn} className="btn btn-primary btn-block waves-effect waves-light" type="button">Log In <i className="fas fa-sign-in-alt ml-1"></i></button>
                                                    </div> 
                                                </div>                           
                                            </form>
                                            {/* <div className="m-3 text-center text-muted">
                                                <p className="mb-0">Don't have an account ?  <a href="auth-register.html" className="text-primary ml-2">Free Resister</a></p>
                                            </div> */}
                                            {/* <div className="account-social">
                                                <h6 className="mb-3">Or Login With</h6>
                                            </div> */}
                                            {/* <div className="btn-group btn-block">
                                                <button type="button" className="btn btn-sm btn-outline-secondary">Facebook</button>
                                                <button type="button" className="btn btn-sm btn-outline-secondary">Twitter</button>
                                                <button type="button" className="btn btn-sm btn-outline-secondary">Google</button>
                                            </div> */}
                                        </div>
                                      
                                    </div>
                                </div>
                                <div className="card-body bg-light-alt text-center">
                                    <span className="text-muted d-none d-sm-inline-block">Namdeo Matrimonial © 2022</span>                                            
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

export default Login;