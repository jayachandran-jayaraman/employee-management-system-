import { useEffect, useState } from "react";
import axios from "axios";
import "./App.css";

function App() {
  const [employees, setEmployees] = useState([]);
  const [editId, setEditId] = useState(null);

  const [form, setForm] = useState({
    name: "",
    email: "",
    department: "",
  });

  const API_URL = "http://127.0.0.1:8000/api/employees";

  useEffect(() => {
    fetchEmployees();
  }, []);

  const fetchEmployees = async () => {
    try {
      const res = await axios.get(API_URL);

      if (Array.isArray(res.data)) {
        setEmployees(res.data);
      } else {
        setEmployees([]);
      }
    } catch (error) {
      console.error("Error fetching employees:", error);
    }
  };

  const handleChange = (e) => {
    setForm({
      ...form,
      [e.target.name]: e.target.value,
    });
  };

  const saveEmployee = async (e) => {
    e.preventDefault();

    if (
      !form.name.trim() ||
      !form.email.trim() ||
      !form.department.trim()
    ) {
      alert("Please fill all fields");
      return;
    }

    try {
      if (editId) {
        await axios.put(
          `${API_URL}/${editId}`,
          form
        );

        alert("Employee Updated Successfully");
      } else {
        await axios.post(API_URL, form);

        alert("Employee Added Successfully");
      }

      setForm({
        name: "",
        email: "",
        department: "",
      });

      setEditId(null);

      fetchEmployees();
    } catch (error) {
      console.error(error);
    }
  };

  const editEmployee = (emp) => {
    setForm({
      name: emp.name,
      email: emp.email,
      department: emp.department,
    });

    setEditId(emp._id);
  };

  const deleteEmployee = async (id) => {
    if (!window.confirm("Delete Employee?")) {
      return;
    }

    try {
      await axios.delete(`${API_URL}/${id}`);

      fetchEmployees();

      alert("Employee Deleted Successfully");
    } catch (error) {
      console.error(error);
    }
  };

  return (
    <div className="container">
      <h1>Employee Management System</h1>

      <form
        onSubmit={saveEmployee}
        className="employee-form"
      >
        <input
          type="text"
          name="name"
          placeholder="Employee Name"
          value={form.name}
          onChange={handleChange}
        />

        <input
          type="email"
          name="email"
          placeholder="Email"
          value={form.email}
          onChange={handleChange}
        />

        <input
          type="text"
          name="department"
          placeholder="Department"
          value={form.department}
          onChange={handleChange}
        />

        <button type="submit">
          {editId
            ? "Update Employee"
            : "Add Employee"}
        </button>
      </form>

      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Department</th>
            <th>Action</th>
          </tr>
        </thead>

        <tbody>
          {employees.length > 0 ? (
            employees.map((emp, index) => (
              <tr
                key={
                  emp._id ||
                  emp.id ||
                  index
                }
              >
                <td>{emp._id || emp.id}</td>
                <td>{emp.name}</td>
                <td>{emp.email}</td>
                <td>{emp.department}</td>

                <td className="action-btns">
                  <button
                    className="update-btn"
                    onClick={() =>
                      editEmployee(emp)
                    }
                  >
                    Edit
                  </button>

                  <button
                    className="delete-btn"
                    onClick={() =>
                      deleteEmployee(
                        emp._id || emp.id
                      )
                    }
                  >
                    Delete
                  </button>
                </td>
              </tr>
            ))
          ) : (
            <tr>
              <td colSpan="5">
                No Employees Found
              </td>
            </tr>
          )}
        </tbody>
      </table>
    </div>
  );
}

export default App;