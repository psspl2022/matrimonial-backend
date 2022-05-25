import { Link } from 'react-router-dom';

function Dashboard() {
    return(
        <>
<div className="page-content">
        <div className="container-fluid">
        <div className="row">
            <div className="col-sm-12">
                <div className="page-title-box">
                    <div className="row">
                        <div className="col">
                            <h4 className="page-title">Analytics</h4>
                            <ol className="breadcrumb">
                                <li className="breadcrumb-item"><Link>Dastone</Link></li>
                                <li className="breadcrumb-item active">Dashboard</li>
                            </ol>
                        </div>
                        <div className="col-auto align-self-center">
                            <Link  className="btn btn-sm btn-outline-primary" id="Dash_Date">
                                <span className="ay-name" id="Day_Name">Today:</span>&nbsp;
                                <span className="" id="Select_date"></span>
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
        <h1>Hello</h1>
        </div>
        </div>
        </>
    );
}

export default Dashboard;

