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

#inputs username
driver.find_element_by_xpath('/html/body/div/form/div[1]/input').send_keys("niraj")
time.sleep(1)

#inputs password
driver.find_element_by_xpath('/html/body/div/form/div[2]/input').send_keys("niraj123")
time.sleep(1)

#click on login
driver.find_element_by_xpath('/html/body/div/form/div[3]/input').send_keys(Keys.ENTER)
time.sleep(3)

#click on appointment
driver.find_element_by_xpath('//*[@id="appointment"]').send_keys(Keys.ENTER)
time.sleep(2)

#click on opening hour
driver.find_element_by_xpath('//*[@id="oh"]').send_keys(Keys.ENTER)
time.sleep(2)

#click on location
driver.find_element_by_xpath('//*[@id="loc"]').send_keys(Keys.ENTER)
time.sleep(8)

#clicks on logout
driver.find_element_by_xpath('/html/body/div/div/a[2]').send_keys(Keys.ENTER)
time.sleep(3)

#closes the browser
driver.close()
print("Sucessfully Logged out after testing all functions")
