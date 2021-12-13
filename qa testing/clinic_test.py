from selenium import webdriver
import time
from selenium.webdriver.common.keys import Keys

print("QA TESTING OUR CHAT BOT")
#open Chrome Driver
driver = webdriver.Chrome()
#maximize the window size
driver.maximize_window()
#delete the cookies
driver.delete_all_cookies()
#navigate to the url
driver.get("http://localhost/chatbot/user/login.php")
driver.find_element_by_xpath('/html/body/div/form/div[1]/input').send_keys("niraj")
time.sleep(1)

driver.find_element_by_xpath('/html/body/div/form/div[2]/input').send_keys("niraj123")
time.sleep(1)

driver.find_element_by_xpath('/html/body/div/form/div[3]/input').send_keys(Keys.ENTER)
time.sleep(10)

driver.find_element_by_xpath('/html/body/div/div/a[2]').send_keys(Keys.ENTER)
time.sleep(10)
#close the browser
driver.close()
print("Sucessfully Logged in")
