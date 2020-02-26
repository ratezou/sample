using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

using System.Net.Http;
using Newtonsoft.Json;

namespace WindowsFormsApp1
{
    public partial class Form1 : Form
    {
        public Form1()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            POST();
        }

        private async void POST()
        {
            var client = new HttpClient();
            var json = JsonConvert.SerializeObject(new request() { key1 = textBox1.Text, key2 = textBox2.Text });
            Encoding utf8 = Encoding.UTF8;
            var content = new StringContent(json, utf8, "application/json");
            var responce = await client.PostAsync("https://ratezou-sample.herokuapp.com/api.php", content);

            var resString = await responce.Content.ReadAsStringAsync();
            var resJson = JsonConvert.DeserializeObject<response>(resString);

            label1.Text = resJson.result + ":" + resJson.message;
        }
    }
}
