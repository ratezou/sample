using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

using Newtonsoft.Json;

namespace WindowsFormsApp1
{
    [JsonObject]
    public class request
    {
        [JsonProperty("key1")]
        public string key1 { get; set; }
        [JsonProperty("key2")]
        public string key2 { get; set; }
    };
    public class response
    {
        [JsonProperty("result")]
        public string result { get; set; }
        [JsonProperty("message")]
        public string message { get; set; }
    };
}
