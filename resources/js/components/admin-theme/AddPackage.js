import { Link } from 'react-router-dom';

function AddPackage(){
    return(
        <>

    <div className="container-fluid">
        <div className="row">
            <div className="col-sm-12">
                <div className="page-title-box">
                    <div className="row">
                        <div className="col">
                            <h4 className="page-title">Add Package</h4>
                            <ol className="breadcrumb">
                                <li className="breadcrumb-item"><Link>Home</Link></li>
                                <li className="breadcrumb-item active">Package</li>
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
                <label >Package Name</label>
                <input type="text" className="form-control"  placeholder="Enter package name" />
            </div>
            <div className="form-group">
                <label >Package Price</label>
                <input type="text" className="form-control"  placeholder="Enter package price" />
            </div>
            <div className="row form-group">
                <div className="col-4">
                    <label >Credit</label>
                    <input type="text" className="form-control"  placeholder="Enter Package credit" />
                </div>
                <div className="col-4">
                    <label >View Count</label>
                    <input type="text" className="form-control"  placeholder="Enter view count" />
                </div>
                <div className="col-4">
                    <label >Shortlist Count</label>
                    <input type="text" className="form-control"  placeholder="Enter shorlist count" />
                </div>
            </div>
            <button type="submit" className="btn btn-primary mr-2">Submit</button>
            <button type="button" className="btn btn-danger">Cancel</button>
        </form>
        </div>
     
    </div>
</div>
        </>
    );
}

export default AddPackage;